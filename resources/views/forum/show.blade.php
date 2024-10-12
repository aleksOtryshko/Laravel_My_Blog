@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Автор: {{ $post->user->name }}</p>
    <a href="{{ route('forum.index') }}">Назад к форуму</a>
@endsection
