@extends('layouts.app')


<style>

    .post_image {
        max-height: 200px;

    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Post View</div>

                    <div class="panel-body">
                        <div class="col-md-4" style="text-align: center">

                            <ul class="list-group">

                                @if(count($categories) > 0)
                                    @foreach($categories->all() as $category)
                                        <li class="list-group-item"><a href="{{url("category/{$category->id}")}}">
                                                {{$category->category}}</a></li>
                                    @endforeach
                                @else
                                    <p>No Category Found!</p>
                                @endif


                            </ul>
                        </div>
                        <div class="col-md-8">
                            @if(count($posts) > 0)
                                @foreach($posts->all() as $post)
                                    <div style="text-align: center; margin-bottom: 1em;">
                                        <h3><b> {{$post->post_title}}</b></h3>
                                        <img class="post_image" src="{{$post->post_image}}" alt="">
                                    </div>

                                    <p>{{ $post->post_body }}</p>



                                    <cite>Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                                    <hr>
                                @endforeach

                            @else
                                <p>No Post Avaliable</p>
                            @endif

                            {{$posts->links()}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
