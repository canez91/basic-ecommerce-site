@extends("layouts.shop")

@section("content")

<!-- banner -->
	<div class="banner10" id="home1">
		<div class="container">
			<h2>Carrito</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a> <i>/</i></li>
				<li>Carrito</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<!--h3>Tu carrito contiene: <span>{{$shopping_cart->productsCount()}} artículos</span></h3-->

			<cart-products-list></cart-products-list>
			
		</div>
	</div>	
	
	
<!-- //checkout -->
@endsection