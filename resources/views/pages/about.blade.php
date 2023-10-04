@extends('layouts.app')
@section('title', 'About')
@section('content')
    <div class="bigTitle">
        <h1>How this works!</h1>
    </div>
    <p>The point of "Secret Santa" is to make Christmas shopping easier and to spread around the spirit of giving to those who you might not normally have on your Christmas list.</p>
    <p>It involves a group of people exchanging names for a secret gift exchange.</p>
    <div class="imgContainer">
        <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/about1.jpg" alt="coolsanta">
    </div>
    <div class="bigTitle">
        <h1>Let's see how Secret Santa works</h1>
    </div>
    <p>Until 13.12.2020, registration is allowed. After registration, all registered users will find themselves in the so-called hat.</p>
    <p>At exactly midnight, the application will randomly pull out all users. An algorithm was created where the same person cannot be Secret Santa himself.</p>
    <p>Upon completion of the draw, users will receive an email with a key.</p>
    <p>This key is used to unlock the user!</p>
    <div class="imgContainer">
        <img class="card-img-top" style="display: block; width: 100%; height: auto;" src="/images/about2.jpg" alt="coolsanta">
    </div>
    <p>After receiving the e-mail, you must enter the site and log in!</p>
    <p>Then go to the "Im santa to" page where you will find the form for entering the key.</p>
    <p>If the key is correct it will show you the person you are Secret Santa!</p>
@endsection
