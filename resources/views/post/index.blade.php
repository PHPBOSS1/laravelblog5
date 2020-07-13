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

            </div>
        </div>
    @empty
        Данные отсутствуют
    @endforelse

@endsection

