<template>
    <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
        <div class="agile_ecommerce_tab_left dresses_grid">
            <div class="hs-wrapper hs-wrapper2">
                <img :src="'/images/'+product.image" alt=" " class="img-responsive" />
                <div class="w3_hs_bottom w3_hs_bottom_sub1">
                    <ul>
                        <li>
                            <a href="#" data-toggle="modal" :data-target="'#myModal'+product.id"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <h5><a :href="'/producto/'+product.sku">{{product.title}}</a></h5>
            <div class="simpleCart_shelfItem">
                <p>
                    <span>
                        {{product.originalPrice}}
                    </span>
                    <i class="item_price">
                        {{product.humanPrice}}
                    </i>
                </p>
                <p>
                  <!--a class="item_add" href="#">Agregar al carrito</a-->
                  <add-product-btn :product="product">
                  </add-product-btn>
                </p>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        mounted() {
            
        },
        props:{
            product:{
                type: Object
            }
        },
        data(){
            return{
               
            }
        }
    }
</script>
