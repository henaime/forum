@extends('layouts.app')

@section('content')
<div class="jumbotron text-center" style="background-color: #FFFFF0;">
    <strong><h1><?php echo $title; ?></h1></strong>
    <p style="font-size: 20px;">

#installation<br>

composer install<br>


php artisan migrate<br>


php artisan serve<br>

#this site was developped by <br>ENAIME HAMZA<br>HAMAOUI AYOUB<BR>AJAANIT TAOUFIK<BR>MOURAD CHAIRI<BR>RAHMANI MOHAMMED<BR>
#FRAMED BY
<BR> AMCHNOUE
</p>
</div>
@endsection