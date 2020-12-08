@extends('layouts.app')

@section('content')
	<div class="container">

		@if(session('info'))
			<div class="alert alert-info">
				{{ session('info') }}
			</div>
		@endif
		
		<div class="card mb-4">
			<div class="card-body">
				<h4 class="card-title">
					{{ $article->title }}
				</h4>
				<h5 class="card-subtitle mb-2 text-muted small">
					<b>By: </b> {{ $article->user->name }},
					Category: <b> {{ $article->category->name }} </b>,
					{{ $article->created_at->diffForHumans() }}
				</h5>
				<p class="card-text">
					{{ $article->body }}
				</p>
				<a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-danger float-right">
					Delete
				</a>
			</div>
		</div>

		<ul class="list-group">
			<li class="list-group-item active">
				Comments <spam class="badge badge-light">
					{{ count($article->comments) }} </spam>
			</li>

			@foreach($article->comments as $comment)
				<li class="list-group-item">
					{{ $comment->content }}
					<a href="{{ url("/comments/delete/$comment->id") }}" class="close">
						&times;
					</a>
					<div class="small mt-2">
						By <b>{{ $comment->user->name }}</b>,
						{{ $comment->created_at->diffForHumans() }}
					</div>
				</li>
			@endforeach
		</ul>

		@auth
		<form action="{{ url('/comments/add') }}" method="post">
			@csrf
			<input type="hidden" name="article_id" value="{{ $article->id }}">
			<textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
			<input type="submit" value="Add Comment">
		</form>
		@endauth

	</div>

@endsection