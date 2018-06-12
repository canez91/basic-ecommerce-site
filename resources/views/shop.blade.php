@extends('layouts.shop')

@section('content')
<!-- banner -->
    <div class="banner" id="home1">
        <div class="container">
            <h3>La moda desaparece, <span>el estilo es eterno</span></h3>
        </div>
    </div>
<!-- //banner -->

<!-- banner-bottom1 -->
    <!--div class="banner-bottom1"-->
    <div>
        <div class="agileinfo_banner_bottom1_grids">
            <div class="col-md-7 agileinfo_banner_bottom1_grid_left">
                <h3>Gran evento de apertura con<span>20% <i>de descuento</i></span></h3>
                <a href="/productos">Comprar ahora</a>
            </div>
            <div class="col-md-5 agileinfo_banner_bottom1_grid_right">
                <!--h4>hot deal</h4>
                <div class="timer_wrap">
                    <div id="counter"> </div>
                </div-->
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //banner-bottom1 -->

@isset($newProducts)
    @foreach ($newProducts as $product)
            <div class="modal video-modal fade" id="myModal{{$product['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModal1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                        </div>
                        <section>
                            <div class="modal-body">
                                <div class="col-md-5 modal_body_left">
                                    <img src="/images/{{$product['image']}}" alt=" " class="img-responsive" />
                                </div>
                                <div class="col-md-7 modal_body_right">
                                    <h4>{{$product['title']}}</h4>

                                    <p>
                                        <span>Código del producto</span>
                                        <br/>
                                        <strong>{{$product['sku']}}</strong>
                                        
                                    </p>
                                    
                                    <p>{{$product['description']}}</p>
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
                                            <span>{{$product['originalPrice']}}</span> 
                                            <i class="item_price">{{$product['humanPrice']}}</i>
                                        </p>
                                        <p><!--a class="item_add" href="#">Agregar a carrito</a-->
                                            <add-product-btn :product='{!! json_encode($product) !!}'>
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
    @endforeach
@endisset

<!-- new-products -->
    @if( count( $newProducts ) > 0 )
        <div class="new-products">
        <div class="container">
            <h3>Nuevos</h3>
            <div class="w3ls_dresses_grid_right_grid3">
                @foreach ($newProducts as $product)
                        <div class="col-md-3 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                            <div class="agile_ecommerce_tab_left dresses_grid">
                                <div class="hs-wrapper hs-wrapper1">
                                    <img src="/images/{{$product['image']}}" alt=" " class="img-responsive" />
                                    <div class="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModal{{$product['id']}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="/producto/{{$product['sku']}}">{{$product['title']}}</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p><span>{{$product['originalPrice']}}</span><i class="item_price">{{$product['humanPrice']}}</i></p>
                                    <p><!--a class="item_add" href="#">Agregar a carrito</a-->
                                        <add-product-btn :product='{!! json_encode($product) !!}'>
                                        </add-product-btn>
                                    </p>
                                </div>
                            </div>
                        </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>
        </div>
        
    @endif
<!-- //new-products -->


@endsection