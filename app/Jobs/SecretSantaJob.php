<?php

namespace App\Jobs;

use App\Mail\SecretKeySend;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SecretSantaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        set_time_limit(0);

        $users = User::all();

        $user_ids = $users->pluck(['id'])->toArray();
        if (count($user_ids) <= 1) return;
        $usersChosen = [];
        foreach ($users as $user) {
            shuffle($user_ids);

            for ($i = 0; $i < count($user_ids); $i++) {
                $random_user_id = $user_ids[$i];

                $random_user = User::find($random_user_id);

                if ($random_user != $user && !$random_user->chosen) {
                    $key = uniqid();

                    /**
                     * pronadji usera kome treba da bude santa,
                     * ne sme da bude sebi niti onom useru kome je dodeljen dedamraz
                     */
                    $payload = [
                        'user_id' => $random_user_id,
                    ];
                    $hash = JWT::encode($payload, $key);
//                    $user->child_hash_info = $hash;
////                        $user->child_hash_info = $random_user_id;
//
//                    $user->save();

                    $random_user->chosen = 1;
                    $random_user->save();

                    $usersChosen[] = [
                        'user_id' => $user->id,
                        'hash' => $hash,
                        'key' => $key,
                        'is_santa_to_user_id' => $random_user_id
                    ];

                    // $key se salje useru na mail
                    array_splice($user_ids, $i, 1);

                    break;
                }

                if (count($user_ids) == 1 && $random_user == $user) {
                    $rand_index = array_rand($usersChosen);

                    $randomUser = $usersChosen[$rand_index];

                    $usersChosen[] = [
                        'user_id' => $user->id,
                        'hash' => $randomUser['hash'],
                        'key' => $randomUser['key'],
                        'is_santa_to_user_id' => $randomUser['is_santa_to_user_id']
                    ];

                    $key = uniqid();

                    /**
                     * pronadji usera kome treba da bude santa,
                     * ne sme da bude sebi niti onom useru kome je dodeljen dedamraz
                     */
                    $payload = [
                        'user_id' => $user->id,
                    ];
                    $hash = JWT::encode($payload, $key);

                    $usersChosen[$rand_index] = [
                        'user_id' => $usersChosen[$rand_index]['user_id'],
                        'hash' => $hash,
                        'key' => $key,
                        'is_santa_to_user_id' => $user->id,
                    ];

                }
            }
        }

        foreach ($usersChosen as $c) {
            $user = User::find($c['user_id']);
            $user->child_hash_info = $c['hash'];
            $user->chosen = 1;
            $user->save();

            //sibni mail userima
            $mail = new SecretKeySend($c, $user);

            Mail::to($user->email)
                ->send($mail);

            sleep(2);
        }
    }
}
