@extends('layouts.layout')


@section('content')

    <div class="main-content">
        <div class="main-content-inner content-width">

            <div class="column-container">

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #916C6C;">
                            <!-- Icon -->
                            <i class="fa fa-heart"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Дизайн</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #7089AD;">
                            <!-- Icon -->
                            <i class="fa fa-font"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Верстка</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #63885F;">
                            <!-- Icon -->
                            <i class="fa fa-fullscreen"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Разработка</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

            </div>

            <div class="column-container">
                <div class="column-three-qtr">
                    <div class="divider"></div>
                    <h3 class="section-title">Последние новости</h3>
                    <div id="blog-nav" class="carousel-nav">
                        <div class="back"></div>
                        <div class="next"></div>
                    </div>
                    <div class="carousel">
                        <ul id="blog-carousel" class="slider-container">


                            <!-- One Fourth -->
                            @foreach($news as $news)
                            <li class="column-one-fourth">
                                <!-- Image -->
                                <a href="{{action('NewsController@detail', [$news->category->short_name, $news['short_name']])}}" class="image-link"><img alt="" src="/images/news-foto/{{$news['img_path']}}"
                                                                                 class="fullwidth">
                                </a>
                                <!-- Title -->
                                <h3><a href="{{action('NewsController@detail', [$news->category->short_name, $news ['short_name']])}}">{{$news['title']}}</a></h3>
                                <!-- Date -->
                                <div class="date">{{$news['created_at']}}</div>
                                <!-- Excerpt -->
                                <p>{{$news['short_discription']}} </p>
                                <!-- Read More Link -->
                                <a href="{{action('NewsController@detail', [$news->category->short_name, $news ['short_name']])}}">Подробнее</a>
                            </li>
                            @endforeach

                            <!-- END One Fourth -->

                        </ul>
                    </div>

                </div>

                <div class="column-one-fourth">

                    <div class="divider"></div>

                    <h3 class="section-title">Комментарии</h3>

                    <div id="testimonials-nav" class="carousel-nav">
                        <div class="back"></div>
                        <div class="next"></div>
                    </div>

                    <div class="carousel">
                        <ul id="testimonials-carousel" class="slider-container">


                            <!-- Testimonial 1 -->
                            @foreach ($comments as $comment)
                            <li class="column-one-fourth">
                                <!-- Text -->
                                <div class="testimonial-text">
                                    <p>{{$comment['message']}}</p>
                                </div>
                                <!-- Name -->
                                <div class="testimonial-name">
                                    <p>Автор: {{$comment['name']}}</p>
                                </div>
                                <div class="testimonial-news">
                                    <p>Новость: {{$comment->news->title}}</p>
                                </div>
                                <!-- Company URL -->
                                <div class="testimonial-link">
                                    <a href="#">Посетитель</a>
                                </div>
                            </li>
                            @endforeach
                            <!-- END Testimonial 1 -->

                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="spacer"></div>

    <div class="content-width">
        <div class="client-logos-container">

            <div class="client-logos-title">
                <span>Наши партнеры</span>
            </div>

            <div id="clients-back"></div>
            <div id="clients-next"></div>

            <div class="carousel">
                <ul id="clients-carousel" class="column-container">

                    <li class="">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <!-- Actual Logo -->
                                <img alt="" src="images\client-logos\logo1.png">
                            </div>
                        </div>
                    </li>

                    <li class="">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <!-- Actual Logo -->
                                <img alt="" src="images\client-logos\logo2.png">
                            </div>
                        </div>
                    </li>

                    <li class="">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <!-- Actual Logo -->
                                <img alt="" src="images\client-logos\logo3.png">
                            </div>
                        </div>
                    </li>

                    <li class="">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <!-- Actual Logo -->
                                <img alt="" src="images\client-logos\logo4.png">
                            </div>
                        </div>
                    </li>

                    <li class="">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <!-- Actual Logo -->
                                <img alt="" src="images\client-logos\logo5.png">
                            </div>
                        </div>
                    </li>

                    <li class="">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <!-- Actual Logo -->
                                <img alt="" src="images\client-logos\logo6.png">
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
@stop