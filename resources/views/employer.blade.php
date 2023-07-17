@extends('partials.app')
@section('title', 'Поиск работы')
@section('content')
    @include('layout.overlay')
    @include('layout.headerEmployer')

    <div class="flex justify-center pt-5 ">
        <div class="pt-2 flex-col bg-white w-full md:w-3/4 lg:w-3/5 xl:w-1/2">
            <div class=" border-b grid grid-cols-2 p-4">
                <span class="text-sm md:text-base lg:text-lg">Новые резюме</span>
                <a class="text-xs md:text-base lg:text-lg ml-auto text-green-400" href="{{ route('resume.index') }}">Все резюме</a>
            </div>

            <div class="flex flex-wrap justify-center md:justify-start">
                @foreach($newResumes as $newResume)
                    <div class="pr-5 pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap">
                        <div>
                            <div class="font-bold text-sm md:text-base lg:text-lg">
                                <a href="{{ route("resume.show", $newResume->author_id) }}">{{ $newResume->profession->name }}</a>
                            </div>
                            <div class="wage text-sm md:text-base lg:text-lg">
                                Зарплата: {{$newResume->wage}} <span class="font-bold">Руб.</span>
                            </div>
                            <div class="city text-sm md:text-base lg:text-lg">
                                Город: {{$newResume->city->name}}
                            </div>
                            <div class="text-sm md:text-base lg:text-lg">
                                {{$newResume->employment->name}}<br>
                                {{$newResume->schedule->name}}
                            </div>
                        </div>
                        <div class="mt-auto aspect-w-16 aspect-h-9">
                            <img class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$newResume->user->image}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        <div class="flex justify-center pt-5 pb-5">
            <div class="pt-2 flex-col bg-white w-full md:w-3/4 lg:w-3/5 xl:w-1/2">
                <div class="border-b grid-cols-2 p-4 flex flex-wrap items-center ">
                    <button id="php-resumes" class="pr-2 text-sm md:text-base lg:text-lg  hover:text-blue-400">PHP разработчики</button>
                    <button id="java-resumes" class="pr-2 text-sm md:text-base lg:text-lg hover:text-blue-400">JAVA разработчики</button>
                    <button id="html-resumes" class="pr-2 text-sm md:text-base lg:text-lg hover:text-blue-400">HTML разработчики</button>
                    <a class="text-xs md:text-base lg:text-lg ml-auto text-green-400" href="{{ route('resume.index') }}">Все резюме</a>
                </div>
                <script>
                    document.getElementById('php-resumes').addEventListener('click', function () {
                        document.querySelectorAll('.java-resume, .html-resume').forEach(function (resume) {
                            resume.style.display = 'none';
                        });
                        document.querySelectorAll('.php-resume').forEach(function (resume) {
                            resume.style.display = 'block';
                        });
                    });

                    document.getElementById('java-resumes').addEventListener('click', function () {
                        document.querySelectorAll('.php-resume, .html-resume').forEach(function (resume) {
                            resume.style.display = 'none';
                        });
                        document.querySelectorAll('.java-resume').forEach(function (resume) {
                            resume.style.display = 'block';
                        });
                    });

                    document.getElementById('html-resumes').addEventListener('click', function () {
                        document.querySelectorAll('.php-resume, .java-resume').forEach(function (resume) {
                            resume.style.display = 'none';
                        });
                        document.querySelectorAll('.html-resume').forEach(function (resume) {
                            resume.style.display = 'block';
                        });
                    });
                </script>
                <div class="flex flex-wrap justify-center md:justify-start">
                    @foreach($phpResumes as $phpResume)
                        <div class="php-resume pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap">
                            <div>
                                <div class="font-bold text-sm md:text-base lg:text-lg">
                                    <a href="{{ route("resume.show", $phpResume->author_id) }}">{{ $phpResume->profession->name }}</a>
                                </div>
                                <div class="wage text-sm md:text-base lg:text-lg">
                                    Зарплата: {{$phpResume->wage}} <span class="font-bold">Руб.</span>
                                </div>
                                <div class="city text-sm md:text-base lg:text-lg">
                                    Город: {{$phpResume->city->name}}
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{$phpResume->employment->name}}<br>
                                    {{$phpResume->schedule->name}}
                                </div>
                            </div>
                            <div class="mt-auto aspect-w-16 aspect-h-9">
                                <img class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$phpResume->user->image}}">
                            </div>

                        </div>
                    @endforeach

                    @foreach($javaResumes as $javaResume)
                        <div class="java-resume pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap" style="display: none;">
                            <div>
                                <div class="font-bold text-sm md:text-base lg:text-lg">
                                    <a href="{{ route("resume.show", $javaResume->author_id) }}">{{ $javaResume->profession->name }}</a>
                                </div>
                                <div class="wage text-sm md:text-base lg:text-lg">
                                    Зарплата: {{$javaResume->wage}} <span class="font-bold">Руб.</span>
                                </div>
                                <div class="city text-sm md:text-base lg:text-lg">
                                    Город: {{$javaResume->city->name}}
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{$javaResume->employment->name}}<br>
                                    {{$javaResume->schedule->name}}
                                </div>
                            </div>
                            <div>
                                <img class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$javaResume->user->image}}">
                            </div>

                        </div>
                    @endforeach

                    @foreach($htmlResumes as $htmlResume)
                        <div class="html-resume pr-5 pl-5 md:pr-10 md:pl-10 sm:pr-10 sm:pl-10 pb-5 px-1 mt-2 md:w-1/3 justify-center md:text-start text-center flex flex-wrap" style="display: none;">
                            <div>
                                <div class="font-bold text-sm md:text-base lg:text-lg">
                                    <a href="{{ route("resume.show", $htmlResume->author_id) }}">{{ $htmlResume->profession->name }}</a>
                                </div>
                                <div class="wage text-sm md:text-base lg:text-lg">
                                    Зарплата: {{$htmlResume->wage}} <span class="font-bold">Руб.</span>
                                </div>
                                <div class="city text-sm md:text-base lg:text-lg">
                                    Город: {{$htmlResume->city->name}}
                                </div>
                                <div class="text-sm md:text-base lg:text-lg">
                                    {{$htmlResume->employment->name}}<br>
                                    {{$htmlResume->schedule->name}}
                                </div>
                            </div>
                            <div>
                                <img class="w-3/5 my-2 mx-auto md:w-full sm:w-2/5" src="/storage/users/{{$htmlResume->user->image}}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection
