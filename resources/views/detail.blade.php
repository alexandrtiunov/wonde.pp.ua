@extends('layouts.layout')

@section ('title')

    <title>{{$title}}</title>

@stop

@section('banner')

@stop

@section('content')

    <div class="main-content">
        <div class="main-content-inner content-width">


            <!-- Main Column / Sidebar -->

            <div class="column-container">


                <!-- Main Column -->

                <div class="column-three-qtr">


                    <!-- Blog Post -->

                    <div class="blog-post actual-post">
                        <!-- Title -->
                        <h1>{{$news->title}}</h1>
                        <!-- Meta -->
                        <div class="blog-meta">
                            <div class="meta-item"><div class="meta-title published">Дата:</div><a href="#">{{$news->created_at}}</a></div>
                            <div class="meta-item"><div class="meta-title comments">Комментарии:</div>{{count($news->comment)}}</div>
                        </div>


                        <!-- Content -->

                        <div class="blog-content">
                            <!-- Paragraph -->
                            <p>{{$news->short_discription}}</p>

                            <div class="media">
                                <div id="portfolio-blog-slider-container">

                                    <div id="portfolio-blog-slider">

                                        <!-- Actual Images -->

                                        <img alt="" src="/images/news-foto/{{$news->img_path}}" class="fullwidth">

                                        <!-- END Actual Images -->

                                    </div>

                                    <div class="content-width">
                                        <div class="client-logos-container">

                                            <div id="clients-back"></div>
                                            <div id="clients-next"></div>

                                            <div class="carousel">
                                                <ul id="foto-carousel" class="column-container">
                                                        @foreach($resources as $resource)
                                                    <li class="">
                                                        <div class="logo-outer">
                                                            <div class="logo-inner">
                                                                <!-- Actual Logo -->
                                                                <img alt="" src="{{$resource['path']}}{{$resource['filename']}}">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Slide Controls -->

                                    <div class="portfolio-blog-slider-controls">
                                        <div id="portfolio-blog-slider-prev"></div>
                                        <div id="portfolio-blog-slider-next"></div>
                                    </div>

                                    <!-- END Slide Controls -->


                                </div>
                            </div>

                            <!-- END Image -->

                            <!-- Paragraph -->
                            <p>{{$news->content}}</p>

                        </div>

                        <!-- END Content -->


                    </div>

                    <!-- END Blog Post -->



                    <!-- Share Links -->

                    <ul class="post-sharing">
                        <li><a href="#"><i class="fa fa-facebook"></i><div class="tooltip">Поделиться в Facebook</div></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i><div class="tooltip">Поделиться в Twitter</div></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i><div class="tooltip">Поделиться в LinkedIn</div></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i><div class="tooltip">Поделиться в Pinterest</div></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i><div class="tooltip">Поделиться в Google+</div></a></li>
                    </ul>

                    <!-- END Share Links -->



                    <!-- Divider -->

                    <div class="divider"></div>

                    <!-- END Divider -->



                    <!-- Reader Comments -->

                    <div class="comments">
                        <h2>Комментарии к статьи</h2>


                        <!-- Comment -->
                        @foreach($comments as $comment)
                        <div class="comment">
                            <!-- Username -->
                            <div class="username">
                                <a href="#">{{$comment['name']}}</a> пишет:
                            </div>
                            <!-- Date -->
                            <div class="date">
                                {{$comment['created_at']}}
                            </div>
                            <!-- Message -->
                            <div class="message">
                                <p>{{$comment['message']}}</p>
                            </div>
                            <!-- Reply Link -->
                            <div class="link">
                                <a href="#">Ответить</a>
                            </div>
                        </div>
                    @endforeach

                        <!-- END Comment -->


                    </div>

                    <!-- END Reader Comments -->



                    <!-- Divider -->

                    <div class="divider"></div>

                    <!-- END Divider -->



                    <!-- Post Comment Form -->

                    <div class="comment-form">
                        <h2>Оставить комментарий</h2>
                        <form id="comment-form" name="comment-form" method="post" >
                            <!-- Textbox -->
                            {{csrf_field()}}
                            <input type="hidden" name="news_id" value="{{$news->id}}">

                            <input type="text" name="name" placeholder="Имя *">
                            <!-- Textbox -->
                            <input type="text" name="email" placeholder="Email *">
                            <!-- Textbox -->
                            <input type="text" name="subjects" placeholder="Тема *">
                            <!-- Comment box -->
                            <textarea name="message" placeholder="Сообщение *"></textarea>
                            <!-- Submit Button -->
                            <input type="submit" class="accent" value="Готово">
                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div><br />
                        @endif
                    </div>

                    <!-- END Post Comment Form -->


                </div>

                <!-- END Main Column -->


            </div>

            <!-- END Main Column / Sidebar -->


        </div>
    </div>

@stop