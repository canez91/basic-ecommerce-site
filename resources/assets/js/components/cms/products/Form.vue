<template>
	<v-form id="productForm">
		<v-layout row wrap>
	          <v-flex xs10 offset-xs1>
	            <v-layout row wrap>
	              <v-flex class="pl-1 pr-1" xs12 sm6 md3>
	                  <v-text-field
				        maxlength="15" 
				        name="sku"
				        v-model="product.sku"
				        box
				        label="SKU"
				      ></v-text-field>
	              </v-flex>
	              <v-flex class="pl-1 pr-1" xs12 sm6 md3>
	                  <v-text-field
				        maxlength="60"
				        name="title"
				        v-model="product.title"
				        box
				        label="Nombre del producto"
				      ></v-text-field>
	              </v-flex>
	              <v-flex class="pl-1 pr-1" xs12 sm6 md3>
	                  <v-text-field
				        maxlength="9"
				        name="price"
				        v-model="product.price"
				        box
				        label="Precio sin descuento"
				      ></v-text-field>
	              </v-flex>
	              <v-flex class="pl-1 pr-1" xs12 sm6 md3>
	                  <v-text-field
				        maxlength="9"
				        name="price2"
				        v-model="product.price2"
				        box
				        label="Precio con descuento"
				      ></v-text-field>
	              </v-flex>
	            </v-layout>
	            <v-layout row wrap>
	              <v-flex xs12 sm6 offset-sm3 md6 offset-md3 >
	                  <v-text-field
		                name="description"
		                label="Descripción"
		                textarea
		                v-model="product.description"
		              >
		              </v-text-field>   
	              </v-flex>
	            </v-layout>

	            <input-file-image
				  :product='product'
				  :method='method'
				>
				</input-file-image>

	          </v-flex>
	    </v-layout>
	    <v-btn href="/sadmin/products" class="blue-grey lighten-4 ">Volver</v-btn>
	    <v-btn @click="send()" class="blue white--text">Guardar</v-btn>
    </v-form>      
</template>

<script>
	import swal from 'sweetalert2';
	export default {
		components: {
	      swal,
	    },
	    data(){
	        return {
	            drawer: false,
	            toolBarTitle: "Registrar Producto",
	            e1: 0,
	            dialog: false,
	        }
	    },
		props: { 
		  product: { 
		  	image_url:null
		  },
		  method: "",
		  route: ""
		},
		methods:{
			send(){
				var url_to = this.method=="POST"?"/sadmin/products":"/sadmin/products/"+this.product.id;
				var data = this.setData();

				axios({
					method: this.method,
					url: url_to,
					data: data,
					headers:{
						"Accept": "application/json",
						"Content-Type": "application/json"
					}
				}).then((response)=>{
					//this.makeSwal("Listo", response.data.msg, "success", "Aceptar");
					swal({
	                  title: "Listo!",
	                  html: response.data.msg,
	                  type: "success",
	                  confirmButtonText: "Aceptar",
	                  allowOutsideClick: false
	                }).then(function(){
	                  window.location.href= "/sadmin/products";
	                });
				}).catch (error => {
		            this.makeSwal("Lo sentimos", error.data.msg, "error", "Aceptar");
		        });  
			},
			setData(){
				if( this.method=="POST" ){
					return {
						sku: this.product.sku,
						title: this.product.title,
						description: this.product.description,
						price: this.product.price,
						price2: this.product.price2,
						image_url: this.product.image_url,
					};
				}

				return this.product;
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
	.input-group__input {
		border: 1px solid #ccc;
	}

	textarea{
		resize: none;
	}
</style>