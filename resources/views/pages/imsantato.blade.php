@extends('layouts.app')
@section('title', 'I\'m Santa to?')
@section('content')
    <div class="bigTitle">
        <h1>I'm Santa to?</h1>
    </div>
        @if(isset($child_user))
            <div class="">
                <div class="card2" style=" font-size: 1em; overflow: hidden; padding: 0; border: none; border-radius: .28571429rem; box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;">
                    <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/santa2.png">
                    <div class="card-block" style="font-size: 1em; position: relative; margin: 0; padding: 1em; border: none; box-shadow: none;">
                        <p class="card-title" style="font-size: 1.28571429em; font-weight: 700; line-height: 1.2857em;">{{ucfirst($child_user->name)}}</p>
                        <p class="card-title" style="font-size: 1.28571429em; font-weight: 300; line-height: 1.2857em;">{{ucfirst($child_user->email)}}</p>
                            <p class="card-title" style="font-size: 1.28571429em; font-weight: 300; line-height: 1.2857em;">Address: {{ucfirst($child_user->address)}}</p>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        @else
            <div class="formsContainer">
                <div class="imgContainerKey">
                    <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/santagift.jpg" alt="coolsanta">
                </div>
                @if($user->child_hash_info)
                    <form method="POST" action="/getMySanta">
                        @csrf
                        <div class="form-group row">
                            <label for="key" class="">Enter Your Key</label>

                            <div class="">
                                <input id="key"
                                       type="key"
                                       class="form-control @error('key') is-invalid @enderror"
                                       name="key"
                                       value="{{request('key') ?? session('key') ?? ''}}"
                                       {{--value="{{ old('key') }}" --}}
                                       required
                                       autocomplete="key" autofocus>

                                @isset($error)
                                    <div class="alert alert-danger">{{$error}}</div>
                                @endisset
                                @error('key')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Santa to Who?</button>
                    </form>

                    @else
                    <h1>It's still early. Wait for the draw and the key to unlock the person to whom you are Secret Santa!</h1>
                @endif
            </div>
            <br>
        @endif
@endsection
