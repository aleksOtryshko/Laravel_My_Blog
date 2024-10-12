@extends('layouts.app')

@section('content')
    <h1>Создать новый пост</h1>

        <form action="{{ route('forum.store') }}" method="POST">
	        @csrf
		        <div>
			            <label for="title">Заголовок:</label>
				                <input type="text" id="title" name="title" required>
						        </div>
							        <div>
								            <label for="content">Содержимое:</label>
									                <textarea id="content" name="content" required></textarea>
											        </div>
												        <button type="submit">Создать</button>
													    </form>
													    @endsection
