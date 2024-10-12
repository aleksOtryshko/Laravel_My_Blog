

<!-- resources/views/forum/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Форум</h1>

        <a href="{{ route('forum.create') }}">Создать новый пост</a>

	    @if ($posts->isEmpty())
	            <p>Постов нет.</p>
		        @else
			        <ul>
				            @foreach ($posts as $post)
					                    <li>
							                        <a href="{{ route('forum.show', $post->id) }}">{{ $post->title }}</a>
										                </li>
												            @endforeach
													            </ul>
														        @endif
															@endsection

