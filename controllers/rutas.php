<?php

    class Routes{
        
        public static function inicio(){

            include ('views/template.html');
        }

        public static function route(){
            // var_dump($_SERVER['REQUEST_URI']);
            if(isset($_SERVER['REQUEST_URI'])){
                switch ($_SERVER['REQUEST_URI']) {
                    case "/":include('views/index.html');break;
                    case "/acerca":include('views/about.html');break;
                    case "/comprar":include('views/shop.html');break;
                    case "/detalles-compra":include('views/shop-details.html');break;
                    case "/carrito-compras":include('views/shoping-car.html');break;
                    case "/detalles-facturacion":include('views/checkout.html');break;
                    case "/lista-de-deseos":include('views/wisslist.html');break;
                    case "/clases":include('views/clases.html');break;
                    case "/blog":include('views/blog.html');break;
                    case "/contacto":include('views/contact.html');break;
                    case "/detalles-blog":include('views/blog-details.html');break;
                    case "/registro":include('views/register.html');break;
                    default:include('views/404.html');
                }
                
            }
            else{
                include('views/index.html');
            }
            
        }
    }

    
?>
