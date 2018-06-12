<template>
<div>
  <material-transition-group tag="div" name="fadeIn" class="row">
    
      <product-card 
        :product="product" 
        v-for="(product, index) in products" 
        :key="product.id"
        :data-index="index"
      >
      </product-card>
      
  </material-transition-group>
  <div v-for="(product, index) in products"  class="modal video-modal fade" :id="'myModal'+product.id" tabindex="-1" role="dialog" aria-labelledby="myModal6">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
            </div>
            <section>
                <div class="modal-body">
                    <div class="col-md-5 modal_body_left">
                        <img :src="'/images/'+product.image" alt=" " class="img-responsive" />
                    </div>
                    <div class="col-md-7 modal_body_right">
                        <h4>{{product.title}}</h4>

                        <p>
                            <span>Código del producto</span>
                            <br/>
                            <strong>{{product.sku}}</strong>
                            
                        </p>

                        <p>{{product.description}}</p>
                        <div class="rating">
                            <div class="rating-left">
                                <img src="images/star-.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="images/star-.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="images/star-.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="images/star.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="rating-left">
                                <img src="images/star.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="modal_body_right_cart simpleCart_shelfItem">
                            <p>
                                <span>{{product.originalPrice}}</span> 
                                <i class="item_price">
                                    {{product.humanPrice}}    
                                </i>
                            </p>
                            <p>
                                <add-product-btn :product="product">
                                </add-product-btn>
                            </p>
                        </div>
                        <!--h5>Color</h5>
                        <div class="color-quality">
                            <ul>
                                <li><a href="#"><span></span>Red</a></li>
                                <li><a href="#" class="brown"><span></span>Yellow</a></li>
                                <li><a href="#" class="purple"><span></span>Purple</a></li>
                                <li><a href="#" class="gray"><span></span>Violet</a></li>
                            </ul>
                        </div-->
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </section>
        </div>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        mounted() {
            
        },
        data(){
            return{
                products: []
            }
        },
        created(){
          this.getProducts();
        },
        methods: {
          getProducts(){
            axios.get("/productsList").then( (response) =>{
              
              this.products = response.data.data;
            });   
            
          },
             
        }
    }
</script>
