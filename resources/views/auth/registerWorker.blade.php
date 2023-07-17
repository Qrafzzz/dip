@extends('partials.app')
@section('title', 'Регистрация')
@section('content')
    <div class="grid place-items-center h-screen">
        <div class="w-full max-w-xs">


            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route("register_processWorker") }}" method="POST">
                <div class="mb-4">
                    <h1 class="text-center">Регистрация</h1>
                    @csrf
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Имя"/>
                    <div class="text-red-500">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="surname" type="text" placeholder="Фамилия"/>
                    <div class="text-red-500">
                        @error('surname')
                        {{$message}}
                        @enderror
                    </div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email"/>
                    <div class="text-red-500">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                    <label class="block text-gray-700 mb-2 text-center">Выберите пол</label>
                    @foreach($genders as $gender)
                        <input name="gender_id" value="{{$gender->id}}" type="radio">{{$gender->name}}
                    @endforeach
                    <div class="text-red-500">
                        @error('gender_id')
                        {{$message}}
                        @enderror
                    </div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="Пароль"/>
                    <div class="text-red-500">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" type="password" placeholder="Потдвердите пароль"/>
                    <div class="text-red-500">
                        @error('password_confirmation')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="text-center text-blue-400">
                        <a href="{{ route("login") }}">Есть аккаунт</a>
                    </div>
                    <div class="text-center text-green-400">
                        <button type="submit">Зарегестрироваться</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

