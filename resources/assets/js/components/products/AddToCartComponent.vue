<template>
	<a @click="addToCart"class="item_add" >{{message}}</a>
</template>

<script>
    import swal from 'sweetalert2';
	export default{
		components: {
          swal,
        },
		data: () => ({
			message: "Agregar al carrito",
			endpoint: "/in_shopping_carts"	
		}),
		props: { product: { type: Object } },
		methods:{
			addToCart(){
				axios({
					method: "POST",
					url: this.endpoint,
					data:{
						product_id: this.product.id
					},
					headers:{
						"Accept": "application/json",
						"Content-Type": "application/json"
					}
				}).then((response)=>{
					if( response.data.action == "new"){
						window.store.commit("increment");
					}
					this.makeSwal("Listo", "Se agregó al carrito.", "success", "Aceptar");
				}).catch (error => {
		            this.makeSwal("Lo sentimos", "No se pudo agregar el producto. Intenta otra vez.", "error", "Aceptar");
		        });  
			},
			makeSwal(swalTitle, swalText, swalType, buttonText){
	            swal({
	              title: swalTitle,
	              html: swalText,
	              type: swalType,
	              confirmButtonText: buttonText,
	              allowOutsideClick: false
	            });
	          }
		}
	}
</script>

<style>
	a.item_add:hover{
	  cursor: pointer;
	}
</style>