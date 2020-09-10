<h1>Show all posts</h1>

@foreach ($posts as $post)
    <li>{{$post->title}}</li>
@endforeach


<script type="text/javascript" src="{{asset("assets/js/app.js")}}"></script>

<script>
    sayMyName();
</script>
