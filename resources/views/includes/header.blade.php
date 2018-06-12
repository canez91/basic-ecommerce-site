<div class="header">
    <div class="container">
        <div class="w3l_logo">
            <h1><a href="/">Women's Fashion<span>For Fashion Lovers</span></a></h1>
        </div>
        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
                <form action="#" method="post">
                    <input type="text" name="Search" placeholder="Search...">
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
        <div class="cart box_1">
            <a href="/carrito">
                <div class="total">
                    Ver carrito 
                </div>
                <img src="/images/bag.png" alt="" />
                (<products-counter :count="{{$shopping_cart->productsCount()}}"></products-counter>)
            </a>
            <div class="clearfix"> </div>
        </div>  
        <div class="clearfix"> </div>
    </div>
</div>