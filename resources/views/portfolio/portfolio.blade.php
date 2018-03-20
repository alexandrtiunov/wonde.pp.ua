@extends('layouts.layout')

@section ('title')

    <title>{{$title}}</title>

@stop

@section('banner')

@stop

@section('content')

    <div class="main-content">
        <div class="main-content-inner content-width">

            <div class="relative">

                <!-- Page Title -->

                <h1>Картинки новостей по категориям</h1>

                <!-- END Title -->


                <!-- Filters -->

                <!-- Ensure all filter tags are in the "show all" data-filter -->
            {{--<div class="portfolio-filtering">--}}
            {{--<ul id="portfolio-filters">--}}
            {{--<li><span class="filter active" data-filter="branding coding identity">Все</span></li>--}}
            {{--<li><span class="filter" data-filter="branding">Новые</span></li>--}}
            {{--<li><span class="filter" data-filter="coding">Популярные</span></li>--}}
            {{--<li><span class="filter" data-filter="identity">Лучшие</span></li>--}}
            {{--</ul>--}}
            {{--</div>--}}

            <!-- END Filters -->

            </div>


            <!-- 4 Column Portfolio Grid -->

            <!-- Add filter tags to each li class -->
            <ul class="column-container grid" id="portfolio">

            @foreach ($categories as $category)
                <!-- One Fourth -->

                    <li class="column-one-fourth portfolio-item branding">
                        <!-- Image -->
                        <a href="#" class="image-link"><img alt="" src="{{$category->img_path}}" class="fullwidth"></a>
                        <!-- Title -->
                        <h3>
                            <a href="{{action('PortfolioController@detail', $category->short_name)}}">{{$category->title}}</a>
                        </h3>
                        <!-- Tags -->
                        {{--<div class="tags">Описание проекта</div>--}}
                    </li>

                    <!-- END One Fourth -->

                @endforeach

            </ul>
            <!-- END 4 Column Portfolio Grid -->
        </div>

        <div class="container">

            <h2>Вы можете добавить свои фотографии к существующим новостям</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br/>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{ \Session::get('error') }}</p>
                    <p><img src="{{  \Session::get('fullPath') }}" style="width: 300px; height: 200px;"></p>
                </div><br/>
            @endif



            <form method="post" action="{{action('PortfolioController@store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="name">Имя:</label>
                        <input type=name class="form-control" name="name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="email">Email:</label>
                        <input type=email class="form-control" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="category">Категория:</label>
                        <select size="1" id="role" class="form-control" name="category_id" required>
                            <option value="">Выбери категорию новости</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="path">Фото:</label>
                        <input type="file" class="form-control" name="path">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="news_id">Новость:</label>
                        <select size="1" id="news" class="form-control" name="news_id" required>
                            <option value="">Выбери новость</option>
                            @foreach($news as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn" style="margin-left:0px">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop

