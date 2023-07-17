@extends('partials.app')
@section('title', 'Профиль')
@section('content')
<div class="flex flex-col md:flex-row md:items-start pt-5 p-80">
    <div>
        <a href="{{ route("profile") }}">Профиль</a><br>
        <a href="{{ route("companyRemove") }}">Создать вакансию</a><br>
        <a href="{{ route("companyAll") }}">Все вакансии</a><br>
        <a href="{{ route("profileResumeEm") }}">Отклики на резюме</a><br>
        <a href="{{ route("profileCompanyEm") }}">Отклики на Вашу вакансию</a>
    </div>
    <div>
        @include("profile.partials.editUser", ["users" => $users])
    </div>

</div>



@include('layout.footer')
@endsection
