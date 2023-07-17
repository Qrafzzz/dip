@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.headerEmployer')
    <div class="flex flex-col md:flex-row md:items-start pt-5 p-80">
        <div>
            <a href="{{ route("profile") }}">Профиль</a><br>
            <a href="{{ route("companyRemove") }}">Создать вакансию</a><br>
            <a href="{{ route("companyAll") }}">Все вакансии</a><br>
            <a href="{{ route("profileResumeEm") }}">Отклики на резюме</a><br>
            <a href="{{ route("profileCompanyEm") }}">Отклики на Вашу вакансию</a>
        </div>
        <div>
            <h3>Ваши отклики на резюме</h3>
            @foreach($companyResumes as $companyResume)
                <div class="company border">
                    <div>
                        <div class="font-bold">
                            <a href="{{ route("employer.show", $companyResume->company->author_id) }}">Ваша вакансия</a>
                        </div>
                        <div>
                            Профессия:{{$companyResume->resume->profession->name}}
                        </div>
                        <div>
                            Контакты для связи:{{$companyResume->resume->user->email}}
                        </div>
                        <div>
                            {{$companyResume->resume->user->surname}} {{$companyResume->resume->user->name}}<br>
                        </div>
                        <div class="font-bold">
                            <a href="{{ route("resume.show", $companyResume->resume->author_id) }}">Подробнее о резюме</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $companyResumes->links() }}
        </div>
    </div>

@endsection
