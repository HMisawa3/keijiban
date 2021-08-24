<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!--トークン-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>掲示板</title>
</head>
<body>
<!-- お題 -->
<div class="card">
  <div class="card-body mx-auto">
　　　【本日のお題はこちら→→→】{{ $theme ->title }}
  </div>
</div>
<!-- 投稿フォーム -->
<form method="POST" action="{{ route('post.store')}}">
{{ csrf_field() }}
  <div class="form-group row mr-2 ml-2">
    <input class="form-control col-11" type="text" placeholder="〇〇字以内で入力して下さい" name="post" required>
    <button type="submit" class="btn btn-primary col-1" name="theme_id" value="{{ $theme ->id }}">投稿</button>
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








<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

