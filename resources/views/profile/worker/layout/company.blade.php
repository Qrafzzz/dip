@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.header')
    <div class="flex flex-col md:flex-row md:items-start pt-5 p-80">
        <div class="mb-4 md:mb-0 mx-5">
            <div>
                <a href="{{ route("profile") }}">Профиль</a>
            </div>
            <div>
                <a href="{{ route("resumeRemove") }}">Создать резюме</a>
            </div>
            <div>
                <a href="{{ route("profileResumeRe") }}">Отклики на вакансии</a>
            </div>
            <div>
                <a href="{{ route("profileCompanyRe") }}">Отклики на Ваше резюме</a>
            </div>

        </div>
        <div class="justify-center">
            <h3 class="mx-5 px-5">Отклики на вакансии</h3>
            <div>
                @foreach($companyResumes as $companyResume)
                    <div class="border m-2 p-3 pr-60">
                        <div>
                            <div>
                                Название компании:{{$companyResume->company->name}}
                            </div>
                            <div>
                                Профессия:{{$companyResume->company->profession->name}}
                            </div>
                            <div>
                                Контакты для связи:{{$companyResume->company->user->email}}
                            </div>
                            <div>
                                <a class="font-bold" href="{{ route("employer.show", $companyResume->company->author_id) }}">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $companyResumes->links() }}
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
