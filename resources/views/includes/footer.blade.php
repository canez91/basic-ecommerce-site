<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contacto</h3>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{ Config::get('enterprise.address') }}</li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:{{ Config::get('enterprise.contact.email') }}">{{ Config::get('enterprise.contact.email') }}</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>{{ Config::get('enterprise.contact.phone') }}</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Información</h3>
                <ul class="info"> 
                    <li><a href="/acerca">Acerca de</a></li>
                    <li><a href="/contacto">Contáctanos</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Categorías</h3>
                <ul class="info"> 
                    <li><a href="/productos">Todos los productos</a></li>
                    
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Social</h3>
                <h4>Síguenos</h4>
                <div class="agileits_social_button">
                    <ul>
                        <li><a href="{{ Config::get('enterprise.social.facebook') }}" target="_blank" class="facebook"> </a></li>
                        <li><a href="{{ Config::get('enterprise.social.twitter') }}" target="_blank" class="twitter"> </a></li>
                        <li><a href="{{ Config::get('enterprise.social.google') }}" target="_blank" class="google"> </a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="footer-copy1">
            <div class="footer-copy-pos">
                <a href="#home1" class="scroll"><img src="/images/arrow.png" alt=" " class="img-responsive" /></a>
            </div>
        </div>
        <div class="container">
            <p>&copy; 2016 Women's Fashion. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>
</div>