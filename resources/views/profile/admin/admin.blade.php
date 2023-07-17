@extends('partials.app')
@section('title', 'Профиль')
@section('content')



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
        <div>
            @include("profile.partials.editUser", ["users" => $users])
        </div>
    </div>
@endsection


