<v-app id="inspire">
	<cms-side-bar :title='{!! json_encode( $title ) !!}'></cms-side-bar>
	<v-content>
		<product-form
			:product='{!! json_encode( $product ) !!}'
			:method='{!! json_encode( $product->method() ) !!}'
			:route='{!! json_encode( $product->url() ) !!}'
		></product-form>
	</v-content>
</v-app>
