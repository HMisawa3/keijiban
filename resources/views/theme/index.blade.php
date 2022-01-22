@extends('layouts.app')
@section('content')

<!-- お題に対するコメント -->
<div id="container">
    <section>
        <!-- お題 -->
        <div class="card">
            <h5 class="card-title">{{ $theme ->title }}</h5>

            <div class="card-body">
                <div>
                    <img src="{{ $theme -> image }}" alt="{{ $theme ->title }}" class="card-image">
                </div>
                <div>
                    <p class="card-text">{{ $theme ->description }}</p>
                    <a href="{{ $theme ->url }}" class="btn btn-secondary card-text-btn" target="_blank">詳しくはこちら</a>
                </div>
            </div>
        </div>
        <!-- コメント欄 -->
        <div class="media">
            <table id="comment">
                <tr class="comment-header">
                  <th class="text-center">〒POST（要約や感想など自由に）</th>
                  @if(Auth::check())
                  <th></th>
                  @endif
                </tr>
                @foreach($posts as $post)
                <tr>
                  <td><p class="post">{{ $post-> post }}<p><p class="timestamp">{{ $post-> created_at }}</p></td>
                  @if(Auth::check())
                  <td>
                    <a onclick="return confirm('このカードを削除して良いですか?')" rel="nofollow" data-method="delete" href="{{ route('post.destroy',['id' => $post -> id]) }}">削除</a>
                  </td>
                  @endif
                </tr>
                @endforeach
            </table>
        </div>
    </section>
</div>

<!-- 投稿フォーム -->
<div class="form-group post-form">
  <input id="postInput" class="form-control" type="text"  max-length="250" placeholder="200字以内で入力して下さい">
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
                <input id="modalInput" class="col-11" type="text" placeholder="200字以内で入力して下さい" name="post" max-length="250" required readonly>
                <button type="submit" class="btn btn-secondary btn2" name="theme_id" value="{{ $theme ->id }}" data-toggle="modal" data-target="#postModal">問題ない</button>
              　 <button type="button" class="btn btn-secondary btn2" data-dismiss="modal">撤回する</button>
              </div>
        </from>
      </div>
    </div>
  </div>
</div>

@endsection
