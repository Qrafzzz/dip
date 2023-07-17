@extends('partials.app')
@section('title', 'Авторизация')
@section('content')
    <div class="grid place-items-center h-screen">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{"login_process"}}">
                <div class="mb-4">
                    <h1 class="text-center">Вход</h1>
                    @csrf

                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email"/>
                    <div class="text-red-500">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>


                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="Пароль"/>
                    <div class="text-red-500">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="text-center">
                        <button class="text-green-400" type="submit">Войти</button>
                    </div>
                    <div class="text-center text-blue-400">
                        <a href="">Забыли пароль?</a>
                    </div>
                    <div class="text-center">
                        Регистрация:<br>
                        <a class="text-blue-400" href="{{ route("register") }}">Соискатель</a>
                        <a class="text-blue-400" href="{{ route("registerWorker") }}">Работодатель</a>
                    </div>


                </div>

            </form>
        </div>
    </div>
@endsection
