<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">

@section ('title')

    <title>Wonde</title>

@show

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ URL::to('css\styles.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css\main.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css\font-awesome.css') }}" rel="stylesheet">


    <script type="text/javascript" src="{{ URL::to('js\jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\main.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\common.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\flickr.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\jquery.carousel-main.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\jquery.carousel-content.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\jquery.mixitup.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\home-slider-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-portfolio-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\portfolio-blog-slider-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-blog-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-testimonials-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-clients-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\portfolio-settings.js')}}"></script>


</head>

<body class="light-bg home">
<div class="main-container">

@section('topbar')
    <div class="topbar-outer dark">
        <div class="topbar content-width">
            <div class="table fullheight">
                <div class="table-cell fullheight middle">
                    <div class="logo">
                        <a href="{{action('IndexController@index')}}"><img alt="" src="{{ URL::to('images\topbar\logo_white.png')}}" height="17">
                        </a>
                    </div>
                </div>
            </div>

            <ul class="topsocial">
                <li><a href="https://www.linkedin.com/in/aleksandr-tiunov-335932154/" target="_blank"><i class="fa fa-linkedin-square"></i><div class="tooltip">LinkedIn</div></a>
                </li>
                <li><a href="https://www.facebook.com/profile.php?id=100001614809253&ref=bookmarks" target="_blank"><i class="fa fa-facebook"></i><div class="tooltip">Facebook</div></a>
                </li>
            </ul>

            <ul class="topnav">
                <li><a href="{{action('IndexController@index')}}" class="current">Главная</a>
                </li>
                <li><a href="{{action ('PortfolioController@index')}}" class="">Галерея</a>
                </li>
                <li><a href="{{action('NewsController@index')}}" >Новости</a>
                </li>
                <li><a href="{{action('ContactController@index')}}">Контакты</a>
                </li>
            </ul>

            <a href="#" class="mobilenav-click">
                <div class="mobilenav-button-container">
                    <div class="mobilenav-button-inner">
                        <div class="mobilenav-button"></div>
                    </div>
                </div>
            </a>

            <div class="mobilenav-container">
                <ul class="mobilenav">
                </ul>
            </div>
        </div>
    </div>
    @show

    @section('banner')

    <div class="home-banner dark">

        <ul class="slider-container" id="home-slider">

            <li class="slide-outer">
                <div class="slide-inner">
                    <div class="content-width">
                        <div class="slide-style-2">
                            <img src="{{URL::to('images\client-logos\beetroot.png')}}">
                            <div class="icon-container">

                                <!-- Icon Backing -->
                                <div class="icon-backing">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="slide-outer">
                <div class="slide-inner">
                    <div class="content-width">
                        <div class="slide-style-1">
                            <!-- Title -->
                            <img src="{{URL::to('images\client-logos\beetroot2.png')}}">
                        </div>
                    </div>
                </div>
            </li>

        </ul>

        <div class="slider-nav-container">
            <div class="slider-nav-inner">
                <div class="slider-nav content-width">

                    <div class="slider-controls">
                        <div id="slider-pause"></div>
                        <div id="slider-prev"></div>
                        <div id="slider-next"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    @show

@yield('content')

    <div class="footer-container">

        <div class="footer-infobar">
            <div class="content-width">
                <!-- Text -->
                Мы предоставляем только проверенную информацию. Все права защищены.
            </div>
        </div>

        <div class="footer">
            <div class="content-width">


                <!-- Four Columns -->

                <div class="column-container">

                    <div class="column-one-fourth">
                        <img alt="" src="..\images\topbar\logo_white.png" height="17" width="57" class="logo">
                        <p>Маркетингово-ориентированное издание, как следует из вышесказанного, редко соответствует рыночным ожиданиям.</p>
                        <p>Психологическая среда, безусловно, порождает продуктовый ассортимент.</p>
                        </p>
                    </div>

                    <div class="column-one-fourth">
                        <img alt="" src="..\images\topbar\logo_white.png" height="17" width="57" class="logo">
                        <p>Маркетингово-ориентированное издание, как следует из вышесказанного, редко соответствует рыночным ожиданиям.</p>
                        <p>Психологическая среда, безусловно, порождает продуктовый ассортимент.</p>
                        </p>
                    </div>

                    <div class="column-one-fourth">

                        <h3>Подписаться</h3>
                        <div class="footer-newsletter">
                            <form id="newsletter" name="newsletter" method="post" action="#">
                                <div class="container">
                                    <input type="text" name="name" class="textbox" placeholder="Email Address">
                                    <input type="submit" name="submit" id="submit" value="Готово" class="button">
                                </div>
                            </form>
                        </div>

                        <h3>Ждем Вас</h3>

                        <ul class="footer-social">
                            <li>
                                <a href="https://www.linkedin.com/in/aleksandr-tiunov-335932154/" target="_blank"><i class="fa fa-linkedin-square"></i><div class="tooltip">LinkedIn</div></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100001614809253&ref=bookmarks" target="_blank"><i class="fa fa-facebook"></i><div class="tooltip">Facebook</div></a>
                            </li>
                        </ul>

                    </div>

                </div>

                <div class="footer-lower-container">

                    <ul class="footer-lower">
                        <li><a href="{{action('IndexController@index')}}">Главная</a>
                        </li>
                        <li><a href="{{action ('PortfolioController@index')}}">Галерея</a>
                        </li>
                        <li><a href="{{action('NewsController@index')}}">Новости</a>
                        </li>
                        <li><a href="{{action('ContactController@index')}}">Контакты</a>
                        </li>
                    </ul>

                    <div class="footer-copyright">
                        &copy; 2018 | Wonde - универсальный бизнес шаблон сайта
                    </div>

                </div>

                <a class="top-of-page-link" href="#"><i class="fa fa-chevron-up"></i></a>

            </div>
        </div>

    </div>

</div>

</body>

</html>