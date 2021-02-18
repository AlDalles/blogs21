@extends('layout1')

@section('title', 'Contacts')

@section('content')


</br></br></br>
</br>

    <h1>Categories </h1>

{{----}}
@if(isset($_SESSION['mark']))
    <form action="/category/{{$category->id}}/update" class="form-text" method="post">
@else <form class="form-text" method="post">
@endif


        <p>Category name <input name="title" size="40" value="{{$_SESSION['data']['title']?? $category->title}}"><br>


        @if (isset($_SESSION['errors']['title']))
        @foreach($_SESSION['errors']['title'] as $error)

                <div class="alert alert-warning" role="alert">
                    {{$error}}
                </div>
            @endforeach

        @endif

        <p>Category slug <input name="slug" size="40" value="{{$_SESSION['data']['slug']?? $category->slug}}"><br>
          @if(isset($_SESSION['errors']['slug']))
                @foreach($_SESSION['errors']['slug'] as $error)
                <div class="alert alert-warning" role="alert">
                    {{$error}}
                </div>
                @endforeach
        @endif
                <p><input name ="submit" type="submit" value="save category">
    </form>
@php unset($_SESSION['errors']);
     unset($_SESSION['data']);
     unset($_SESSION['mark']);
@endphp
        @endsection