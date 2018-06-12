<template>
	<div v-if="products.length>0">
		<div class="checkout-right">
			
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>No.</th>	
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Remover</th>
					</tr>
				</thead>

				<tr 
				  :key="productInCart.product.id"
			      :data-index="index"
			      v-for="(productInCart, index) in products"
			    >

					<td class="invert">{{index+1}}</td>
					<td class="invert-image">
			            <a :href="'/products/'+productInCart.product.id">
									   <img :src="'/images/'+productInCart.product.image_url" alt=" " class="img-responsive" />
			            </a>
					</td>
					<td class="invert">
						<div class="quantity"> 
							<div class="quantity-select">                           
								<div class="entry value-minus" @click="minus(productInCart)">&nbsp;</div>
								<div class="entry value"><span>{{productInCart.amount}}</span></div>
								<div class="entry value-plus" @click="plus(productInCart)">&nbsp;</div>
							</div>
						</div>
					</td>
					<td class="invert">{{productInCart.product.title}}</td>
					<td class="invert">${{productInCart.product.price}}</td>
					<td class="invert">
						<div class="rem">
							<div class="close1" @click="remove(productInCart.id)"> </div>
						</div>
					</td>
				</tr>
				
				</tr>
			</table>

		</div>
		<div class="checkout-left">	
			<div class="checkout-left-basket">
				<h4 @click="pay()" style="cursor: pointer">Pagar</h4>
				<ul>
					<li
            v-for="(productInCart, index) in products"
          >{{productInCart.product.title}}<i></i> <span>${{productInCart.product.price*productInCart.amount}} </span></li>
					<!--li>Total Service Charges <i>-</i> <span>$15.00</span></li-->
					<li> <strong>Total</strong>  <i></i> <span><strong>{{total}}</strong></span></li>
				</ul>
			</div>
			<div class="checkout-right-basket">
				<a href="/productos"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Seguir comprando</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div v-else>
		<h4 style="text-align: center">Tu carrito de compras se encuentra vacío.</h4>
	</div>
</template>

<script>
	import swal from 'sweetalert2';
	export default {
		components: {
	      swal,
	    },
		data(){
			return{
				fetchEndPoint: "/carrito/productos",
				deleteEndPoint: "/in_shopping_carts/",
				plusEndPoint: "/carrito/aumentar",
				minusEndPoint: "/carrito/reducir",
				products: []
			}
		},
		created(){
			this.fetchProducts();
		},
		computed:{
		  total(){
        let total = 0;

        for (var i = 0; i < this.products.length; i++) {
          total += this.products[i].amount * this.products[i].product.price;
        }
		  	/*let cents = this.products.reduce( (acumulator, currentObj)=>{
		  	  return acumulator + currentObj.numberPrice;	
		  	}, 0);*/

		  	return "$"+(total);
		  }	
		},
		methods: {
			pay(){
				window.location = "/pagar";
				let timerInterval
				swal({
				  title: 'Espera ',
				  html: 'En un momento serás redireccionado.',
		          allowOutsideClick: false,
				  timer: null,
				  onOpen: () => {
				    swal.showLoading()
				    timerInterval = setInterval(() => {
				      swal.getContent().querySelector('strong')
				        .textContent = swal.getTimerLeft()
				    }, 100)
				  },
				  onClose: () => {
				    clearInterval(timerInterval)
				  }
				}).then((result) => {
				  if (
				    // Read more about handling dismissals
				    result.dismiss === swal.DismissReason.timer
				  ) {
				    //console.log('I was closed by the timer')
				  }
				})
			},
			plus(inShoppingCart){
				let data = {
				  data1: inShoppingCart.id,
				  data2: inShoppingCart.product.id	
				};

				axios.post(this.plusEndPoint, data).then((response)=>{
					window.store.commit("increment");
					this.fetchProducts();
				}).catch (error => {
		            
		        }); 
			},
			minus(inShoppingCart){
				let data = {
				  data1: inShoppingCart.id,
				  data2: inShoppingCart.product.id	
				};

				axios.post(this.minusEndPoint, data).then((response)=>{
					window.store.commit("decrement");
					this.fetchProducts();
				}).catch (error => {
		            
		        }); 
			},
			remove(inShoppingCart){
				axios.delete(this.deleteEndPoint+inShoppingCart).then( response =>{
					window.store.commit("decrement");
					this.fetchProducts();
				});
			},
			redirect(route){
				alert(route);
				window.location = route;
			},
			fetchProducts(){
				axios.get(this.fetchEndPoint).then( response =>{
					this.products = response.data;
				});
			}
		}
	}
</script>