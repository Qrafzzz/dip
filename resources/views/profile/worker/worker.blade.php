@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    <div class="flex flex-col md:flex-row md:items-start pt-5 p-80 ">
        <div>
            <a href="{{ route("profile") }}">Профиль</a><br>
            <a href="{{ route("resumeRemove") }}">Создать резюме</a><br>
            <a href="{{ route("profileResumeRe") }}">Отклики на вакансии</a><br>
            <a href="{{ route("profileCompanyRe") }}">Отклики на Ваше резюме</a>
        </div>
        <div class="justify-center">
            @include("profile.partials.editUser", ["users" => $users])
        </div>
    </div>
    @include('layout.footer')
@endsection
