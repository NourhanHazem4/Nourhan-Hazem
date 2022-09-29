@extends('layouts.parent')
@section('title','All Posts')


@section('content')

<table cellpadding=5 border=2 width=800 align=center >
    <tr height=200 >
            <div align=center border=5>

            <form method="post"  action="{{ route('all_posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title">TITLE</label>
                            <input type="text" name="title" id="title" class="form-control" style="width: 300px">
                        </div>

                    </div>
                </div>
                <div class="form-row">
                    <div class="col-4">
                        <div class="form-group">
                            <textarea name="details" id="details" cols="40" rows="10">DETAILS</textarea>
                        </div>
                    </div>

                <div class="form-row">
                    <div class="col-12">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" style="width: 300px">

                    </div>
                    <div class="col-2 my-3">
                        <button class="btn btn-primary"> CREATE </button>
                    </div>
                </div>
            </form>
            </div>
    </tr>

  <table style="width:100%">
all posts table
<div class="row">
    @foreach ($posts as $post)
    <div class="card" style="width: 18rem;">
        <input type="hidden" value="{{$post->title}}">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->details}}</p>
          <form action="{{route('post.delete',$post->id)}}" method="post" >
            {{-- @csrf --}}
            @method('DELETE')
            <button class="btn btn-outline-danger">Delete</button>
        </form>
      </div>
      </div>
      @endforeach
</div>
  </table>
</table>
@endsection
