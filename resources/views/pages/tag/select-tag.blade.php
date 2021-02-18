@extends('layout1')

@section('title', 'Tags')

@section('content')

    <h1>Tags Update </h1>

<form action="/tag/update" method="post">
        <select name = id size="1">


    @forelse($tags as $tag)
                <option  value={{ $tag->id }}>{{ $tag->title }}</option>

@empty
            <p>no tags</p>
@endforelse
        </select>
    <input type="hidden" name="mark" value="mark">
    <input name ="update" type="submit" value="select tag"><br>

    </form>



@endsection