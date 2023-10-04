@extends('layouts.app')
@section('title', 'Candidates')
@section('content')
    <div class="bigTitle">
        <h1>Candidates for Secret Santa!</h1>
    </div>
    <p>This is the list of all participating candidates!</p>

    <div>
        <div class="timer">
            <p id="demo"></p>
        </div>

    @if(count($users) > 0)
            @isset($users)
                @foreach($users as $user)
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                        <div class="card" style=" font-size: 1em; overflow: hidden; padding: 0; border: none; border-radius: .28571429rem; box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;">
                            <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/santa2.png" alt="santacardimg">
                            <div class="card-block" style="font-size: 1em; position: relative; margin: 0; padding: 1em; border: none; box-shadow: none;">
                                <p class="card-title" style="font-size: 1.28571429em; font-weight: 700; line-height: 1.2857em;">{{ucfirst($user->name)}}</p>
                                <p class="card-text"><b>{{$user->email}}</b></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        @else
            <p>There are no candidates!</p>
        @endif
    </div>
@endsection
