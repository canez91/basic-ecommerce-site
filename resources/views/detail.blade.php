@extends("layouts.shop")

@section("content")
<!-- banner -->
  <div class="banner10" id="home1">
    <div class="container">
      <h2>Detalle del producto</h2>
    </div>
  </div>
<!-- //banner -->

<!-- breadcrumbs -->
  <div class="breadcrumb_dress">
    <div class="container">
      <ul>
        <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a> <i>/</i></li>
        <li>Detalle</li>
      </ul>
    </div>
  </div>
<!-- //breadcrumbs -->

<!-- single -->
  <div class="single">
    <div class="container">
      <div class="col-md-4 single-left">
        <div class="flexslider">
          <ul class="slides">
            <li data-thumb="/images/{{$product->image_url}}">

              <div class="thumb-image"> <img src="/images/{{$product->image_url}}" data-imagezoom="true" class="img-responsive"> </div>
            </li>
            <!--li data-thumb="/images/b.jpg">
               <div class="thumb-image"> <img src="/images/b.jpg" data-imagezoom="true" class="img-responsive"> </div>
            </li>
            <li data-thumb="/images/c.jpg">
               <div class="thumb-image"> <img src="/images/c.jpg" data-imagezoom="true" class="img-responsive"> </div>
            </li--> 
          </ul>
        </div>
        <!-- flixslider -->
          <script>
          // Can also be used with $(document).ready()
          $(window).load(function() {
            $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
            });
          });
          </script>
        <!-- flixslider -->
        
      </div>
      <div class="col-md-8 single-right">
        <h3>{{$product->title}}</h3>

        <p>
            <span>Código del producto</span>
            <br/>
            <strong>{{$product->sku}}</strong>
            
        </p>

        <div class="rating1">
          <span class="starRating">
            <input id="rating5" type="radio" name="rating" value="5">
            <label for="rating5">5</label>
            <input id="rating4" type="radio" name="rating" value="4">
            <label for="rating4">4</label>
            <input id="rating3" type="radio" name="rating" value="3" checked>
            <label for="rating3">3</label>
            <input id="rating2" type="radio" name="rating" value="2">
            <label for="rating2">2</label>
            <input id="rating1" type="radio" name="rating" value="1">
            <label for="rating1">1</label>
          </span>
        </div>
          <div class="description">
            <h5><i>Descripción</i></h5>
            <p>{{$product->description}}</p>
          </div>
          
          <div class="simpleCart_shelfItem">
              <p>
                <span>${{$product->price}}</span> 
                <i class="item_price">
                  ${{$product->price2}}
                </i>
              </p>
              <p>
                <add-product-btn :product='{!! json_encode($product) !!}'>
                </add-product-btn>
              </p>
            </div>

      </div>
      <div class="clearfix"> </div>
    </div>
  </div>

  <div class="social-bar">
    <a href="https://www.facebook.com/zizicom1/?fref=ts" class="icon icon-facebook" target="_blank"></a>
    <a href="https://twitter.com/DevCodela" class="icon icon-twitter" target="_blank"></a>
    <a href="https://www.youtube.com/channel/UCxP_SyHzgsslfDoND0nU5WQ" class="icon icon-youtube" target="_blank"></a>
    <a href="https://www.instagram.com/devcodela/" class="icon icon-instagram" target="_blank"></a>
  </div>

<!--div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <div class="fb-share-button" data-href="http://todosobrecamisetas.com/2018/06/leicester-city-adidas-home-kit-2018-19/" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftodosobrecamisetas.com%2F2018%2F06%2Fleicester-city-adidas-home-kit-2018-19%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>

 <a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=Hello%20world"
  data-size="large">
Tweet</a-->


  <div class="additional_info">
    <div class="container">
      <div class="sap_tabs">  
        <div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
          <ul>
            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Información del producto</span></li>
            <!--li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li-->
          </ul>   
          <div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
            <h3>{{$product->title}}</h3>
            <p>{{$product->description}}</p>
          </div>  

          <div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
            <h4>(2) Reviews</h4>
            <div class="additional_info_sub_grids">
              <div class="col-xs-2 additional_info_sub_grid_left">
                <img src="/images/1.png" alt=" " class="img-responsive" />
              </div>
              <div class="col-xs-10 additional_info_sub_grid_right">
                <div class="additional_info_sub_grid_rightl">
                  <a href="single.html">Laura</a>
                  <h5>April 03, 2016.</h5>
                  <p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
                    velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
                    quo voluptas nulla pariatur.</p>
                </div>
                <div class="additional_info_sub_grid_rightr">
                  <div class="rating">
                    <div class="rating-left">
                      <img src="/images/star-.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star-.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star-.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star.png" alt=" " class="img-responsive">
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </div>
                <div class="clearfix"> </div>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="additional_info_sub_grids">
              <div class="col-xs-2 additional_info_sub_grid_left">
                <img src="/images/2.png" alt=" " class="img-responsive" />
              </div>
              <div class="col-xs-10 additional_info_sub_grid_right">
                <div class="additional_info_sub_grid_rightl">
                  <a href="single.html">Michael</a>
                  <h5>April 04, 2016.</h5>
                  <p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
                    velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
                    quo voluptas nulla pariatur.</p>
                </div>
                <div class="additional_info_sub_grid_rightr">
                  <div class="rating">
                    <div class="rating-left">
                      <img src="/images/star-.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star-.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star.png" alt=" " class="img-responsive">
                    </div>
                    <div class="rating-left">
                      <img src="/images/star.png" alt=" " class="img-responsive">
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </div>
                <div class="clearfix"> </div>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="review_grids">
              <h5>Add A Review</h5>
              <form action="#" method="post">
                <input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                <input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
                <textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
                <input type="submit" value="Submit" >
              </form>
            </div>
          </div>                                            
        </div>  
      </div>
      
      <script type="text/javascript">
        $(document).ready(function () {
          $('#horizontalTab1').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
          });
        });
      </script>

      <script>
      $(document).ready(function () {
        var ARTICLE_TITLE = document.title;
        var ARTICLE_URL = encodeURIComponent(window.location.href);
        var MAIN_IMAGE_URL = encodeURIComponent($('meta[property="og:image"]').attr('content'));

        $('.share-fb').click(function () {
          alert("facebook")
          open_window('http://www.facebook.com/sharer/sharer.php?u=' + ARTICLE_URL, 'facebook_share');
        });

        $('.share-twitter').click(function () {
          open_window('http://twitter.com/share?url=' + ARTICLE_URL, 'twitter_share');
        });

        $('.share-google-plus').click(function () {
          open_window('https://plus.google.com/share?url=' + ARTICLE_URL, 'google_share');
        });

        $('.share-linkedin').click(function () {
          open_window('https://www.linkedin.com/shareArticle?mini=true&url=' + ARTICLE_URL + '&title=' + ARTICLE_TITLE + '&summary=&source=', 'linkedin_share');
        });

        $('.share-pinterest').click(function () {
          open_window('https://pinterest.com/pin/create/button/?url=' + ARTICLE_URL + '&media=' + MAIN_IMAGE_URL + '&description=' + ARTICLE_TITLE, 'pinterest_share');
        });

        $('.share-tumblr').click(function () {
          open_window('http://www.tumblr.com/share/link?url=' + ARTICLE_URL + '&name=' + ARTICLE_TITLE + '&description=' + ARTICLE_TITLE, 'tumblr_share');
        });

        function open_window(url, name) {
          window.open(url, name, 'height=320, width=640, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, directories=no, status=no');
        }
        });
      </script>
    </div>
  </div>
  
<!-- //single -->

@endsection