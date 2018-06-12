@extends('layouts.shop')

@section('content')
<!-- banner -->
	<div class="banner10" id="home1">
		<div class="container">
			<h2>Contáctanos</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a> <i>/</i></li>
				<li>Contáctanos</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- mail -->
	<div class="mail">
		<div class="container">
			<h3>Contáctanos</h3>
			<div class="agile_mail_grids">
				<div class="col-md-5 contact-left">
					<h4>Domicilio</h4>
					<p>{{ Config::get('enterprise.address') }}</p>
					<ul>
						<li>Lada sin costo: {{ Config::get('enterprise.contact.freephone') }}</li>
						<li>Teléfono: {{ Config::get('enterprise.contact.phone') }}</li>
						<li>Fax: {{ Config::get('enterprise.contact.fax') }}</li>
						<li><a href="mailto:{{ Config::get('enterprise.contact.email') }}">{{ Config::get('enterprise.contact.email') }}</a></li>
					</ul>
				</div>
				<div class="col-md-7 contact-left">
					<h4>Formulario de contacto</h4>
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Nombre" required="">
						<input type="email" name="Email" placeholder="Correo electrónico" required="">
						<input type="text" name="Phone" placeholder="Teléfono" required="">
						<textarea name="Message" placeholder="Mensaje..." required=""></textarea>
						<input type="submit" value="Enviar" >
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="contact-bottom">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29967.065929081746!2d-101.19420278715495!3d20.13891813516316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cfac6125d8345%3A0xb5b485d7b3358697!2sUriangato%2C+Gto.!5e0!3m2!1ses-419!2smx!4v1528383281923" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
<!-- //mail -->
@endsection