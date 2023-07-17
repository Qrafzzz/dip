@extends('partials.app')
@section('title', 'Профессии')
@section('content')
    @include('layout.header')


    <div class="flex flex-col md:flex-row md:items-start pt-5 p-80">
        <div>
            <a href="{{ route("profile") }}">Профиль</a><br>
            <a href="{{ route("users") }}">Пользователи</a><br>
            <a href="{{ route("company") }}">Все вакансии</a><br>
            <a href="{{ route("resume") }}">Все резюме</a><br>
            <a href="{{ route("profession") }}">Профессии</a><br>
            <a href="{{ route("category") }}">Категории</a><br>
            <a href="{{ route("city") }}">Города</a><br>
        </div>
        <div class="pl-5">
            <form action="{{ route("createProfession")}}" method="POST">
                @csrf
                <div>
                    <label>Название</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" name="name" type="text"
                           placeholder="Название"/>

                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <select name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    {{$message}}
                    @enderror
                </div>

                <button type="submit">Сохранить и выложить</button>
            </form>
        </div>


        @include("profile.admin.table.profession", ["professions" => $professions])


    </div>
@endsection



