@extends('layouts.app')

@section('content')
	
	<div class="container">

		@if(session('info'))
			<div class="alert alert-info">
				{{ session('info') }}
			</div>
		@endif

		{{ $articles->links() }}

		@foreach($articles as $article)
			<div class="card mb-4">
				<div class="card-body">
					<h4 class="card-title">
						{{ $article->title }}
					</h4>
					<h5 class="card-subtitle mb-2 text-muted small">
						<b>By: </b> {{ $article->user->name }},
						<b>Category: </b> {{ $article->category->name }},
						{{ $article->created_at->diffForHumans() }},
						<b>Comment: </b> {{ count($article->comments) }}
					</h5>
					<div class="card-text">
						{{ $article->body }}
					</div>
					<a href="{{ url("/articles/detail/$article->id") }}" class="card-link">View More</a>
				</div>
			</div>
		@endforeach	
	</div>

@endsection