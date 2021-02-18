@extends('layout1')

@section('title', 'Contacts')

@section('content')


</br></br></br>
</br>
@if(isset($_SESSION['mark']))
    <form action="/tag/{{$tag->id}}/update" class="form-text" method="post">
        @else <form class="form-text" method="post">
            @endif


            <p>tag name <input name="title" size="40" value="{{$_SESSION['data']['title']?? $tag->title}}"><br>


            @if (isset($_SESSION['errors']['title']))
                @foreach($_SESSION['errors']['title'] as $error)

                    <div class="alert alert-warning" role="alert">
                        {{$error}}
                    </div>
                @endforeach

            @endif

            <p>tag slug <input name="slug" size="40" value="{{$_SESSION['data']['slug']?? $tag->slug}}"><br>
            @if(isset($_SESSION['errors']['slug']))
                @foreach($_SESSION['errors']['slug'] as $error)
                    <div class="alert alert-warning" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <p><input name ="submit" type="submit" value="save tag">
        </form>
    @php unset($_SESSION['errors']);
     unset($_SESSION['data']);
     unset($_SESSION['mark']);
    @endphp
    @endsection