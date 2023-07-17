@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.headerEmployer')
    <div class="flex flex-col md:flex-row md:items-start pt-5 p-80">
        <div class="">
            <a href="{{ route("profile") }}">Профиль</a><br>
            <a href="{{ route("companyRemove") }}">Создать вакансию</a><br>
            <a href="{{ route("companyAll") }}">Все вакансии</a><br>
            <a href="{{ route("profileResumeEm") }}">Отклики на резюме</a><br>
            <a href="{{ route("profileCompanyEm") }}">Отклики на Вашу вакансию</a>
        </div>
        <div class="flex">
            <table class="border-2 border-lime-300">
                <td>Название вакансии</td>
                <td>Название компании</td>
                <td>Проффессия</td>
                <td>Зарплата</td>
                <td>Город</td>
                <td>Адресс</td>
                <td>Опыт работы</td>
                <td>Описание</td>
                <td>Тип занятости</td>
                <td>График работы</td>
                <td class="">Действие</td>


                @foreach($companies as $company)
                    <tr class="border-2 border-lime-300">
                        <td>
                            {{$company->preview}}
                        </td>
                        <td>
                            {{$company->name}}
                        </td>
                        <td>
                            {{$company->profession->name}}
                        </td>
                        <td>
                            {{ $company->min_wages }} @isset($company->max_wages) - {{ $company->max_wages }} @endisset <span class="">Руб.</span>
                        </td>
                        <td>
                            {{$company->city->name}}
                        </td>
                        <td>
                            {{$company->address}}
                        </td>
                        <td>
                            {{$company->experience->name}}
                        </td>
                        <td>
                            {{$company->description}}
                        </td>
                        <td>
                            {{$company->employment->name}}
                        </td>
                        <td>
                            {{$company->schedule->name}}
                        </td>
                        <td>
                            <a href="{{route( 'companyUpdate', $company->id)}}">Изменить</a>
                        </td>
                        <td>
                            <a href="{{route( 'deleteCompany', $company->id)}}">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

