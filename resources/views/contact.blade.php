@extends('layouts.layout')

@section ('title')

    <title>{{$title}}</title>

@stop

@section('banner')

@stop

@section('content')

    <div class="main-content">
        <div class="main-content-inner content-width">


            <!-- Page Title -->

            <h1>Наши контакты</h1>

            <!-- END Title -->



            <!-- Intro -->

            {{--<p>Позиционирование на рынке, как следует из вышесказанного, индуцирует анализ зарубежного опыта. Можно предположить, что точечное воздействие нетривиально. По сути, структура рынка очевидна не для всех.</p>--}}

            <!-- END Intro -->



            <!-- Spacer x 2 -->

            <div class="spacer"></div>
            <div class="spacer"></div>

            <!-- END Spacer x 2 -->



            <!-- Left Aligned Icons & Text (Vertically centered) -->

            <div class="column-container">


                <!-- One Third -->

                <div class="column-one-third">
                    <div class="icons-column vertical-center">
                        <!-- Icon Backing -->
                        <div class="icon-backing">
                            <!-- Icon -->
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="content-column vertical-center">
                        <!-- Title -->
                        <h3 class="no-margin">Телефоны</h3>
                        <!-- Text -->
                        <p>+38 (066) 008-89-96</p>
                    </div>
                </div>

                <!-- END One Third -->



                <!-- One Third -->

                <div class="column-one-third">
                    <div class="icons-column vertical-center">
                        <!-- Icon Backing -->
                        <div class="icon-backing">
                            <!-- Icon -->
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="content-column vertical-center">
                        <!-- Title -->
                        <h3 class="no-margin">Email</h3>
                        <!-- Text -->
                        <p><a href="#">alexandrtiuonv87@gmail.com</a></p>
                    </div>
                </div>

                <!-- END One Third -->



                <!-- One Third -->

                <div class="column-one-third">
                    <div class="icons-column vertical-center">
                        <!-- Icon Backing -->
                        <div class="icon-backing">
                            <!-- Icon -->
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="content-column vertical-center">
                        <!-- Title -->
                        <h3 class="no-margin">Адрес</h3>
                        <!-- Text -->
                        <p>Краматорск, ул. Волоколамская 39</p>
                    </div>
                </div>

                <!-- END One Third -->


            </div>

            <!-- END Left Aligned Icons & Text -->



            <!-- Spacer x 3 -->

            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>

            <!-- END Spacer x 3 -->

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

            <!-- Contact Form -->

            <div class="contact-form">
                <form id="feedback-form" method="post" action="{{action('ContactController@store')}}">
                    {{csrf_field()}}
                    <!-- Textbox -->
                    <input type="text" name="name" placeholder="Имя *">
                    <!-- Textbox -->
                    <input type="text" name="email" placeholder="Email *">
                    <!-- Textbox -->
                    <input type="text" name="phone" placeholder="Телефон">
                    <!-- Message Box -->
                    <textarea name="message" placeholder="Сообщение *"></textarea>
                    <!-- Submit Button -->
                    <input type="submit" class="accent" value="Готово">
                </form>
            </div>

            <!-- END Contact Form -->


        </div>
    </div>

@stop