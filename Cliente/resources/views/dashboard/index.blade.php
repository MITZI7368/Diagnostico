@extends('/base/plantilla')  
@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio Sesion</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="inicio.css">

</head>
<body>

        <!-- BANNER-->
        <header class="hm-banner">
            <img class="img-banner" src="banner.png" alt="Imagen de banner">
            <a href=""></a>
        </header>

        <!-- =HOME CATEGROIAS= -->
        <section class="hm-page-block">
            <div class="container">
                <div class="header-title">
                    <h1  data-aos="fade-up" data-aos-duration="3000">Categorías</h1>
                </div>

                <div class="hm-grid-category">

                    <div class="grid-item" data-aos="fade-up" data-aos-duration="1000">
                        <a href="productos.php">
                            <img src="gine.jpeg" alt="">
                            <div class="c-info">
                                <h3>Instrumental Ginecológico</h3>
                            </div>
                        </a>
                    </div>

                    <div class="grid-item" data-aos="fade-up" data-aos-duration="1500">
                        <a href="/productos">
                            <img src="uroanalisis.jpeg" alt="">
                            <div class="c-info">
                                <h3>Uroanálisis</h3>
                            </div>
                        </a>
                    </div>

                    <div class="grid-item" data-aos="fade-up" data-aos-duration="2000">
                        <a href="/productos">
                            <img src="analisis.jpeg" alt="">
                            <div class="c-info">
                                <h3>Los mas buscados</h3>
                            </div>
                        </a>
                    </div>

                    <div class="grid-item" data-aos="fade-up" data-aos-duration="2000">
                        <a href="/productos">
                            <img src="odonto.jpg" alt="">
                            <div class="c-info">
                                <h3>Odontologia</h3>
                            </div>
                        </a>
                    </div>

                </div>

            </div>

            
            

</section>
         {{-- <!-- ===HOME PRODUCTOS DESTACADOS=== -->
        <section class="hm-page-block bg-fondo">

            <div class="container">

                <div class="header-title" data-aos="fade-up">
                    <h1>Productos populares</h1>
                </div>

                <!-- TABS -->
                <ul class="hm-tabs" data-aos="fade-up">
                    <li class="hm-tab-link">
                        Ginecología
                    </li>

                    <li class="hm-tab-link ">
                        Odontología
                    </li>

                    <li class="hm-tab-link ">
                       Analisis Clínico
                    </li>


                </ul>

                <!-- CONTENIDO DE LOS TABS -->
                <!-- odonto -->
                <div class="tabs-content" data-aos="fade-up">

                    <div class="grid-product">

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="gine1.jpeg" alt="">
                                </a>
                                <span class="stin stin-new">Nuevo</span>
                            </div>

                            <div class="p-info">
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="gine2.jpeg" alt="">
                                </a>
                            </div>

                            <div class="p-info">
                    
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="gine3.jpeg" alt="">
                                </a>
                            </div>

                            <div class="p-info">
                               
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="gine4.jpeg" alt="">
                                </a>
                                <span class="stin stin-new">Nuevo</span>
                            </div>

                            <div class="p-info">
                              
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--odonto-->
                <div class="tabs-content" data-aos="fade-up">

                    <div class="grid-product">

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="odonto1.jpeg" alt="">
                                </a>
                                <span class="stin stin-new">Nuevo</span>
                            </div>

                            <div class="p-info">
                              
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>


                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="odonto2.jpeg" alt="">
                                </a>
                                <span class="stin stin-new">Nuevo</span>
                            </div>

                            <div class="p-info">
                               
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="odonto3.jpeg" alt="">
                                </a>
                            </div>

                            <div class="p-info">
                              
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="odonto4.jpeg" alt="">
                                </a>
                            </div>

                            <div class="p-info">
                              
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- analisis -->
                <div class="tabs-content" data-aos="fade-up">

                    <div class="grid-product">

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="analisis1.jpeg" alt="">
                                </a>
                                <span class="stin stin-new">Nuevo</span>
                            </div>

                            <div class="p-info">
                              
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="analisis2.jpeg" alt="">
                                </a>
                            </div>

                            <div class="p-info">
                              
                                <div class="precio">
                                    <span>S/ 00.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="analisis3.jpeg" alt="">
                                </a>
                            </div>

                            <div class="p-info">
                             
                                <div class="precio">
                                    <span>$758.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                        <div class="product-item">
                            <div class="p-portada">
                                <a href="#">
                                    <img src="analisis4.jpeg" alt="">
                                </a>
                            </div>

                            <div class="p-info">
                               
                                <div class="precio">
                                    <span>$849.00</span>
                                </div>
                                <a href="#" class="hm-btn btn-primary uppercase">AGREGAR AL CARRITO</a>
                            </div>

                        </div>

                    </div>

                </div> --}}


</section>


    </div>
    
    <!-- Animaciones : AOS-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Mi Script -->
    <script src="inicio.js"></script>

    <script>
    
        AOS.init({
            duration: 1200,
        })


    </script>

</body>
</html>

@endsection