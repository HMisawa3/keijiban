@extends('layouts.app')
@section('content')

<!-- お題 -->
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
     <img src="{{ $theme -> image }}" alt="{{ $theme ->title }}" width="400" height="180">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $theme ->title }}</h5>
        <p class="card-text">{{ $theme ->description }}</p>
        <a href="{{ $theme ->url }}" class="btn btn-secondary">詳しくはこちら</a>
      </div>
    </div>
  </div>
</div>

<!-- 投稿フォーム -->
<form method="POST" action="{{ route('post.store')}}">
{{ csrf_field() }}
  <div class="form-group row mr-2 ml-2">
    <input class="form-control col-11" type="text" placeholder="〇〇字以内で入力して下さい" name="post" required>
    <button type="submit" class="btn btn-secondary" name="theme_id" value="{{ $theme ->id }}" >投稿</button>
  </div>
</form>
<!-- お題に対するコメント -->
@foreach($posts as $post)
<div class="media-body">
    <div class="media mt-3">
        <div class="media-body mt-2 mr-3 ml-3">
           {{ $post-> post }}
        </div>
    </div>
</div>
@endforeach

@endsection