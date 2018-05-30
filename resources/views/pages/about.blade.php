@extends('layouts.app')

@section('content')
<div class="jumbotron text-center" style="background-color: #FFFFF0;">
    <strong><h1><?php echo $title; ?></h1></strong>
    <p style="font-size: 20px;">

#installation<br>

composer install<br>


php artisan migrate<br>


php artisan serve<br>


#this site was developped by<br>

<span>
<img src="/storage/hamza_enaime.jpg" width="140" height="140" class="img-circle">
	ENAIME HAMZA
	
</span>
<span class="form-group">
<img src="/storage/hamaoui_ayoub.jpg" width="140" height="140" class="img-circle">
	HAMAOUI AYOUB
</span>
<span class="form-group">
<img src="/storage/taoufik ajaanit.jpg" width="140" height="140" class="img-circle">
	AJAANIT TAOUFIK
</span>
<span class="form-group">
<img src="/storage/rahmani_mohammed.jpg" width="140" height="140" class="img-circle">
	RAHMANI MOHAMMED
</span>
<span class="form-group">
<img src="/storage/chairi_mourad.jpg" width="140" height="140" class="img-circle">
	CHAIRI RAHMANI
</span>
<br><br><br><br>#FRAMED BY
<div>
<span class="form-group">
<img src="#" width="140" height="140" class="img-circle">
	Monsieur KHALID AMCHNOUE
</span>
</div>
</p>
</div>
@endsection