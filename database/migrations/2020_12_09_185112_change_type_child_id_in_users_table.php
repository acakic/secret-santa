<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeChildIdInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('child_id')->nullable()->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('child_id', 'child_hash_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('child_hash_info', 'child_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('child_id')->change();
        });
    }
}
