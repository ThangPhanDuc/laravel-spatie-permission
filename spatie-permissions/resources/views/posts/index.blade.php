<h1>this is list post</h1>
@foreach($posts as $p)
  <p>{{ $p->id }}. {{ $p->title }}</p>


@endforeach
