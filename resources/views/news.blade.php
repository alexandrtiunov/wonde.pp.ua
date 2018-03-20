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

                @foreach($news as $item)
                <!-- Blog Post -->

                <div class="blog-post">

                    <!-- Title -->
                    <h1><a href="{{action('NewsController@detail', [$item->category->short_name, $item['short_name']])}}">{{$item['title']}}</a></h1>
                    <!-- Meta -->
                    <div class="blog-meta">
                        <div class="meta-item"><div class="meta-title published">Дата:</div>{{$item['created_at']}}</div>
                        {{--<div class="meta-item"><div class="meta-title views">Просмотры:</div><a href="#">9</a></div>--}}
                        <div class="meta-item"><div class="meta-title comments">Комментарии:</div>{{count($item->comment)}}</div>
                        {{--<div class="meta-item"><div class="meta-title tags">Теги</div><a href="#">новости</a>, <a href="#">шаблоны</a></div>--}}
                    </div>
                    <h3>{{$item['short_discription']}}</h3>
                    <!-- Image -->
                    <a href="{{action('NewsController@detail', [$item->category->short_name, $item['short_name']])}}" class="media image-link"><img alt="" src="/images/news-foto/{{$item['img_path']}}" class="fullwidth"></a>
                    <!-- Excerpt -->
                    <div class="blog-content">
                        {{--<p>{{$item['short_discription']}}</p>--}}
                        <!-- Read More Button -->
                        <a href="{{action('NewsController@detail', [$item->category->short_name, $item['short_name']])}}" class="button accent">Читать далее</a>
                    </div>
                </div>

                <!-- END Blog Post -->

                @endforeach

                <!-- Navigation -->


                <div class="blog-nav">


                    {{--<a href="{{$news->previousPageUrl()}}" class="back">Назад</a>--}}
                    {{--<a href="{{$news->nextPageUrl()}}" class="next">Вперед</a>--}}
                </div>


                <!-- END Navigation -->


            </div>

            <!-- END Main Column -->



            <!-- Sidebar -->

            <div class="column-one-fourth sidebar">


                <!-- Categories -->

                <div class="sidebar-widget categories">
                    <!-- Title -->
                    <h3>Категории новостей</h3>
                    <!-- Category Links -->
                    @foreach($categories as $category)
                    <a href="{{action('NewsController@index', $category['short_name'])}}">{{$category['title']}}</a>
                   @endforeach
                </div>

                <!-- END Categories -->



                <!-- Search -->

                <div class="sidebar-widget search">
                    <!-- Title -->
                    <h3>Поиск по сайту</h3>
                    <!-- Search Form -->
                    <form id="search-news" name="news-search" method="get" action="{{action('NewsController@index')}}">
                        <div class="container">
                            <!-- Textbox -->
                            <input type="text" id="news-search" name="news-search" placeholder="Искать">
                            <!-- Search Button -->
                            <input type="submit" id="go" class="go" value="&#xf002;">
                        </div>
                    </form>
                </div>

                <!-- END Search -->

            </div>

            <!-- END Sidebar -->


        </div>

        <!-- END Main Column / Sidebar -->


    </div>
</div>
    @stop