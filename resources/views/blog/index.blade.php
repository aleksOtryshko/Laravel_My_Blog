@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
	                <h1>Blog Posts</h1>

			            @if ($posts->count())
				                    @foreach ($posts as $post)
						                        <div class="card mb-3">
									                        <div class="card-header">{{ $post->title }}</div>
												                        <div class="card-body">
															                            <p>{{ $post->body }}</p>
																		                            </div>
																					                        </div>
																								                @endforeach
																										            @else
																											                    <p>No posts available.</p>
																													                @endif
																															        </div>
																																    </div>
																																    </div>
																																    @endsection

