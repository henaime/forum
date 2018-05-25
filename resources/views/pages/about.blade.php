@extends('layouts.app')

@section('content')
<div style="color: white">
    <strong><h1><?php echo $title; ?></h1></strong>
    <p style="font-size: 20px;">
ensa de tanger ginf1 2017/2018 forum projet realised with laravel<br>

#installation<br>

composer install<br>

(make sure that you have the correct information of your database in .env file )<br>

php artisan migrate<br>

then lance it using:<br>

php artisan serve<br>
</p>
</div>
@endsection