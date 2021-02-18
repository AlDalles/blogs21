@extends('layout1')

@section('title', 'Post')

@section('content')



<body>
<div class="container">
    <div class="row justify-content-start">
        <div class="col title">
            <h1>Добавить новый пост</h1>
        </div>
        <div class="col-4,info1" class ="container-form">
            <form action="" name="main" method="post" class="form">
                <h2 class="col-4,info1 title">Title</h2>
                <input name="title"  class ="input-titel display-form" value="{{$_SESSION['data']['title']?? $post->title}}">
                @if (isset($_SESSION['errors']['title']))
                    @foreach($_SESSION['errors']['title'] as $error)

                        <div class="alert alert-warning" role="alert">
                            {{$error}}
                        </div>
                    @endforeach

                @endif
                <input name="slug"  class ="input-titel display-form" value="{{$_SESSION['data']['slug']?? $post->slug}}">
                @if(isset($_SESSION['errors']['slug']))
                    @foreach($_SESSION['errors']['slug'] as $error)
                        <div class="alert alert-warning" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <textarea name="body" class="form-textarea display-form">{{$_SESSION['data']['body']?? $post->body}}</textarea>
                @if(isset($_SESSION['errors']['body']))
                    @foreach($_SESSION['errors']['body'] as $error)
                        <div class="alert alert-warning" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <select name="category_id" class ="select-form">
                    @if(isset($_SESSION['data']['category_id']))
                    {{$select_id=$_SESSION['data']['category_id']}}
                    @else {{$select_id=$post->category_id}}
                    @endif


                    @foreach($categories as $categoryforID)



                        <option @if ($categoryforID->id==$select_id): selected @endif value="{{$categoryforID->id}}">{{$categoryforID->title}}</option>


                            @endforeach
                </select>
                @if (isset($_SESSION['errors']['category_id']))
                    @foreach($_SESSION['errors']['category_id'] as $error)

                        <div class="alert alert-warning" role="alert">
                            {{$error}}
                        </div>
                    @endforeach

                @endif
                <div>
                    @foreach($tags as $tag)
                        <div class="input-group">
                         @if(isset($_SESSION['data']['tags_id']))
                                <input @if(array_search($tag->id,$_SESSION['data']['tags_id'])!==false) checked @endif class = "input-checkbox" type="checkbox" name="tags_id[]" value={{$tag->id}}>{{$tag->title}}
                            @else
                                <input @if(array_search($tag->id,$post->tags->pluck('id')->toArray())!==false) checked @endif class = "input-checkbox" type="checkbox" name="tags_id[]" value={{$tag->id}}>{{$tag->title}}
                        @endif

                        </div>
                    @endforeach
                </div>
                        <input class = "input-checkbox submit-save" type="submit" name="save" value="Save">
                </div>
        @if (isset($_SESSION['errors']['tags_id']))
            @foreach($_SESSION['errors']['tags_id'] as $error)

                <div class="alert alert-warning" role="alert">
                    {{$error}}
                </div>
                @endforeach

                @endif
            </form>
        </div>
    </div>
</div>
@php unset($_SESSION['errors']);
     unset($_SESSION['data']);
     unset($_SESSION['mark']);
@endphp
</body>
</html>

@endsection