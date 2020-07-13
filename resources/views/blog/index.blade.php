@if (Session::has('a'))
    <div>
        {{ Session::get('a') }}
    </div>
@endif
@extends('layouts.app')

@section('content')
    <style>
        .post {
            margin-bottom: 20px;
        }
        .title {
            margin-bottom: 10px;
        }
    </style>

    @forelse ($posts as $post)
        <div class="post">
            <div class="title">
                {{$post->title}}
            </div>
            <div>
                {{$post->text}}
                <a href="/blog/edit/{{$post->id}}">редактировать</a>
                <a href="/blog/post/delete/{{$post->id}}">удалить</a>
            </div>
        </div>
    @empty
        Данные отсутствуют
    @endforelse

@endsection
