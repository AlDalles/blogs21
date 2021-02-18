@extends('layout1')

@section('title', 'delete-tags')

@section('content')
    <h1> Список Тегов</h1>
    <form method="get" action='delete_many'>
        <select name = "tags_id[]" size={{$tags->count()}} multiple="multiple">
            @forelse($tags as $tag)


                <option value={{ $tag->id }}>{{ $tag->title }}</option>

            @empty
                <p>no tags</p>
            @endforelse



        </select> <br><input name ="submit" type="submit" value="delete tags"></form>
    @push('scripts')
        <script src="/example.js"></script>
    @endpush
@endsection