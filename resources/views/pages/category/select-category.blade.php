@extends('layout1')

@section('title', 'Categories')

@section('content')

    <h1>Category Update </h1>

<form action="/category/update" method="post">
        <select name = id size="1">



    @forelse($categories as $category)
                <option  value={{ $category->id }}>{{ $category->title }}</option>

@empty
            <p>no categories</p>
@endforelse
        </select>
    <input type="hidden" name="mark" value="mark">
    <input name ="update" type="submit" value="select category"><br>
    </form>



@endsection