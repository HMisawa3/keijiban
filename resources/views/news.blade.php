@foreach($news as $data)
<p>{{$data['name']}}</p>
<p>{{$data['url']}}</p>
<p>{{$data['thumbnail']}}</p>
@endforeach