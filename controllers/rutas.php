<?php

class Routes
{

    public function __construct()
    {
        session_start();

        include 'views/template.php';
    }

    public static function route()
    {
        
        // var_dump($_SERVER['REQUEST_URI']);
        if (isset($_SERVER['REQUEST_URI'])) {
            switch ($_SERVER['REQUEST_URI']) {
                // case "/": include 'views/index.html';
                    // break;
                case "/acerca":include 'views/about.html';
                    break;
                case "/comprar":include 'views/shop.html';
                    break;
                case "/detalles-compra":include 'views/shop-details.html';
                    break;
                case "/carrito-compras":include 'views/shoping-car.html';
                    break;
                case "/detalles-facturacion":include 'views/checkout.html';
                    break;
                case "/lista-de-deseos":include 'views/wisslist.html';
                    break;
                case "/clases":include 'views/class.html';
                    break;
                case "/blog":include 'views/blog.html';
                    break;
                case "/contacto":include 'views/contact.html';
                    break;
                case "/detalles-blog":include 'views/blog-details.html';
                    break;
                case "/registro":include 'views/register.html';
                    break;
                case "/acceder":include 'views/login.html';
                    break;
                case "/":
                        // echo $_SESSION["nombre"];
                        if (isset($_SESSION["nombre"])) {
                            // include 'views/home.html';
                            echo "<script>window.location.href='/home'</script>;";



                        } 
                        else {
                            include 'views/index.html';
                        }; break;
                case "/home":
                    // echo $_SESSION["nombre"];
                    if (isset($_SESSION["nombre"])) {
                        include 'views/home.html';
                    } else {
                        echo "<script>alert('Aún no has iniciado sesión');
  window.location.href='/';
</script>";

                    }

                    break;
                default:include 'views/404.html';
            }

        } else {
            include 'views/index.html';
        }

    }
}
