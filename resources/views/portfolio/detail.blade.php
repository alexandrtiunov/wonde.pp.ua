@extends('layouts.layout')

@section ('title')

    <title>{{$title}}</title>

@stop

@section('banner')

@stop

@section('content')

    <div id="image-news-foto">
        <table>
            @foreach($images as $image)
                <tr>
                    <td>
                        <h4>Добавил: {{$image['name']}} ({{$image['email']}}) - {{$image['created_at']}}</h4>
                        <img src="{{\App\Libraries\Helpers::getUploadPath($image)}}" class="news-foto">
                        <h2>Новость: {{$image->news->title}}</h2>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop