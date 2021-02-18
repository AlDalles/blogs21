@extends('layout1')

@section('title', 'delete-category')

@section('content')
    <h1> Список категорий</h1>
    <form method="get" action='delete_many'>
        <select name = "categories_id[]" size={{$categories->count()}} multiple="multiple">
            @forelse($categories as $category)


                <option value={{ $category->id }}>{{ $category->title }}</option>

            @empty
                <p>no categories</p>
            @endforelse



        </select> <br><input name ="submit" type="submit" value="delete categories"></form>
    @push('scripts')
        <script src="/example.js"></script>
    @endpush
@endsection