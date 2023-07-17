@extends('partials.app')
@section('title', 'Поиск работы')
@section('content')
    <div class="">
        @include('layout.overlay')
        @include('layout.header')
        <div class="flex justify-center pt-5 ">
            <div class="pt-2 flex-col bg-white w-full md:w-3/4 lg:w-3/5 xl:w-1/2">
                <div class="border-b grid grid-cols-2 p-4">
                    <span class="text-sm md:text-base lg:text-lg">Новые вакансии</span>
                    <a class="text-xs md:text-base lg:text-lg ml-auto text-green-400" href="{{ route('employer.index') }}">Все вакансии</a>
                </div>

                <div class="flex flex-wrap justify-center md:justify-start ">
                    @foreach($employers as $employer)
                        <div class="pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap">
                            <div>
                                <div class="font-bold text-sm md:text-base lg:text-lg">
                                    <a href="{{ route("employer.show", $employer->author_id) }}">{{ $employer->preview }}</a>
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $employer->profession->name }}
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $employer->min_wages }} @isset($employer->min_wages)
                                        - {{ $employer->max_wages }}
                                    @endisset <span class="font-bold">Руб.</span></div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $employer->city->name }}</div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $employer->name }}</div>
                            </div>
                            <div class="mt-auto aspect-w-16 aspect-h-9">
                                <img  class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$employer->user->image}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex justify-center pt-5 pb-5">
            <div class="pt-2 flex-col bg-white w-full md:w-3/4 lg:w-3/5 xl:w-1/2">
                <span class="p-4">Web-программисты:</span>
                <div class="border-b grid-cols-2 p-4 flex flex-wrap items-center">
                    <button id="php-employers" class="pr-2 text-xs md:text-base lg:text-lg  hover:text-blue-400">PHP разработчиков</button>
                    <button id="java-employers" class="pr-2 text-xs md:text-base lg:text-lg  hover:text-blue-400">JAVA разработчиков</button>
                    <button id="html-employers" class="pr-2 text-xs md:text-base lg:text-lg  hover:text-blue-400">HTML разработчиков</button>
                    <a class="text-xs md:text-base lg:text-lg ml-auto text-green-400" href="{{ route('employer.index') }}">Все вакансии</a>
                </div>
                <script>
                    document.getElementById('php-employers').addEventListener('click', function () {
                        document.querySelectorAll('.java-employer, .html-employer').forEach(function (employer) {
                            employer.style.display = 'none';
                        });
                        document.querySelectorAll('.php-employer').forEach(function (employer) {
                            employer.style.display = 'block';
                        });
                    });

                    document.getElementById('java-employers').addEventListener('click', function () {
                        document.querySelectorAll('.php-employer, .html-employer').forEach(function (employer) {
                            employer.style.display = 'none';
                        });
                        document.querySelectorAll('.java-employer').forEach(function (employer) {
                            employer.style.display = 'block';
                        });
                    });

                    document.getElementById('html-employers').addEventListener('click', function () {
                        document.querySelectorAll('.php-employer, .java-employer').forEach(function (employer) {
                            employer.style.display = 'none';
                        });
                        document.querySelectorAll('.html-employer').forEach(function (employer) {
                            employer.style.display = 'block';
                        });
                    });
                </script>
                <div class="flex flex-wrap justify-center md:justify-start">
                    @foreach($phpEmployers as $phpEmployer)
                        <div class="php-employer pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap">
                            <div>
                                <div class="font-bold text-sm md:text-base lg:text-lg">
                                    <a href="{{ route("employer.show", $phpEmployer->author_id) }}">{{ $phpEmployer->preview }}</a>
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $phpEmployer->profession->name }}
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $phpEmployer->min_wages }} @isset($phpEmployer->min_wages)
                                        - {{ $phpEmployer->max_wages }}
                                    @endisset <span class="font-bold">Руб.</span></div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $phpEmployer->city->name }}</div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $phpEmployer->name }}</div>
                            </div>
                            <div class="mt-auto aspect-w-16 aspect-h-9">
                                <img class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$phpEmployer->user->image}}">
                            </div>
                        </div>

                    @endforeach

                    @foreach($javaEmployers as $javaEmployer)
                        <div class="java-employer pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap" style="display: none;">
                            <div>
                                <div class="font-bold text-sm md:text-base lg:text-lg">
                                    <a href="{{ route("employer.show", $javaEmployer->author_id) }}">{{ $javaEmployer->preview }}</a>
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $javaEmployer->profession->name }}
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $javaEmployer->min_wages }} @isset($javaEmployer->min_wages)
                                        - {{ $javaEmployer->max_wages }}
                                    @endisset <span class="font-bold">Руб.</span></div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $javaEmployer->city->name }}</div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $javaEmployer->name }}</div>
                            </div>
                            <div class="mt-auto aspect-w-16 aspect-h-9">
                                <img class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$javaEmployer->user->image}}">
                            </div>

                        </div>
                    @endforeach

                    @foreach($htmlEmployers as $htmlEmployer)
                        <div class="html-employer pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap" style="display: none;">
                            <div>
                                <div class="font-bold text-sm md:text-base lg:text-lg">
                                    <a href="{{ route("employer.show", $htmlEmployer->author_id) }}">{{ $htmlEmployer->preview }}</a>
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $htmlEmployer->profession->name }}
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{ $htmlEmployer->min_wages }} @isset($htmlEmployer->min_wages)
                                        - {{ $htmlEmployer->max_wages }}
                                    @endisset <span class="font-bold">Руб.</span></div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $htmlEmployer->city->name }}</div>
                                <div class="text-sm md:text-base lg:text-lg">{{ $htmlEmployer->name }}</div>
                            </div>
                            <div class="mt-auto aspect-w-16 aspect-h-9">
                                <img class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$htmlEmployer->user->image}}">
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
