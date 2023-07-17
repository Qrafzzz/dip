@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.header')
    <div class="pl-10 flex flex-col md:flex-row items-center justify-around px-4 md:px-8 py-2 md:py-4">
    <form action="{{ route("updateCategorySubmit", $category->id) }}" method="POST">
        @csrf

        <input class="border-solid border-b-2 border-b-lime-300" value="{{$category->name}}" name="name" type="text" placeholder="name"/>

        @error('name')
        {{$message}}
        @enderror

        <button type="submit">Обновить</button>
    </form>

</div>
@endsection

