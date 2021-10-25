@extends('layouts.app')
@section('content')

<!-- お題 -->
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
     <img src="{{ $theme -> image }}" alt="{{ $theme ->title }}" width="100%" height="100%">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $theme ->title }}</h5>
        <p class="card-text">{{ $theme ->description }}</p>
        <a href="{{ $theme ->url }}" class="btn btn-secondary" target="_blank">詳しくはこちら</a>
      </div>
    </div>
  </div>
</div>

<!-- 投稿フォーム -->
  <div class="form-group">
    <input id="postInput" class="form-control col-11" type="text" placeholder="〇〇字以内で入力して下さい">
    <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#postModal">投稿</button>
  </div>
  <!-- modal -->
  <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="modal-post" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">本当に投稿して良いですか？</h5>
      </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('post.store')}}">
              {{ csrf_field() }}
                <div class="form-wrap row mr-2 ml-2">
                  <input id="modalInput" class="col-11" type="text" placeholder="〇〇字以内で入力して下さい" name="post" required readonly>
                  <button type="submit" class="btn btn-secondary btn2" name="theme_id" value="{{ $theme ->id }}" data-toggle="modal" data-target="#postModal">問題ない</button>
                　 <button type="button" class="btn btn-secondary btn2" data-dismiss="modal">撤回する</button>
                </div>
          </from>
        </div>
      </div>
    </div>
  </div>

<!-- お題に対するコメント -->
@foreach($posts as $post)
<div class="media-body">
    <div class="media mt-3">
        <div class="media-body mt-2 mr-3 ml-3">
            <table id="comment">
                <tr>
                  <th class="width70">投稿</th>
                  <th class="width30">投稿時間</th>
                  @if(Auth::check())
                  <th></th>
                  @endif
                </tr>
                <tr>
                  <td>{{ $post-> post }}</td>
                  <td>{{ $post-> created_at }}</td>
                  <td>
                    @if(Auth::check())
                      <a onclick="return confirm('このカードを削除して良いですか?')" rel="nofollow" data-method="delete" href="{{ route('post.destroy',['id' => $post -> id]) }}">削除</a>
                    @endif
                  </td>
                </tr>
              </table>
        </div>
    </div>
</div>
@endforeach

@endsection
