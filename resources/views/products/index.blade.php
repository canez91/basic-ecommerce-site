@extends("layouts.app")

@section("content")
<v-app id="inspire">
	<cms-side-bar :title='{!! json_encode( $title ) !!}'></cms-side-bar>
	<v-content>
		<product-catalog
		  :products='{!! json_encode( $products ) !!}'
		></product-catalog>
	</v-content>

</v-app>
@endsection