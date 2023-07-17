@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.header')
    <div class="pl-10 flex flex-col md:flex-row items-center justify-around px-4 md:px-8 py-2 md:py-4">
    <form action="{{ route("updateProfessionSubmit", $profession->id) }}" method="POST">
        @csrf
        <div>
            <input class="border-solid border-b-2 border-b-lime-300" value="{{$profession->name}}" name="name" type="text" placeholder="name"/>

            @error('name')
            {{$message}}
            @enderror
        </div>

        <div>
            <select name="category_id">
                @foreach($categories as $category)
                    <option @if($category->id === $profession->category_id) selected @endif value="{{ $category->id }}" > {{ $category->name }} </option>
                @endforeach
            </select>

            @error('category_id')
            {{$message}}
            @enderror
        </div>


        <button type="submit">Обновить</button>
    </form>

</div>
@endsection

