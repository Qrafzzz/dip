@extends('partials.app')
@section('title', $employer->name)
@section('content')
    @include('layout.header')
    @if(session()->has('success'))
        <div class="flex items-center justify-around text-green-400">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="flex items-center justify-around text-red-400">
            {{ session()->get('error') }}
        </div>
    @endif

    <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
        <img class="w-32 h-32 rounded-full mx-auto" src="/storage/users/{{$employer->user->image}}">
        <h2 class="text-center text-2xl font-semibold mt-3">{{ $employer->preview }}</h2>
        <p class="text-center text-gray-600 mt-1">{{$employer->profession->name}}</p>
        <p class="text-center text-gray-600 mt-1">{{ $employer->min_wages }} @isset($employer->min_wages) - {{ $employer->max_wages }} @endisset <span class="">Руб.</span></p>
        @if(auth('web')->user()->role_id=== 1)
            <form class="text-center font-semibold mt-3" method="GET" action="{{ route("addResponseCompany", $employer->id) }}">
                @csrf
                <button type="submit">Откликнуться</button>
            </form>
        @endif
        <div class="mt-5">
            <h3 class="text-xl font-semibold">Описание</h3>
            <p class="text-gray-600 mt-2">{{$employer->description}}</p>
            <p class="text-gray-600 mt-2">Город: {{$employer->city->name}}</p>
            <p class="text-gray-600 mt-2">Адрес: {{$employer->address}}</p>
            <p class="text-gray-600 mt-2">Опыт работы: {{$employer->experience->name}}</p>
            <p class="text-gray-600 mt-2">Тип занятости: {{$employer->employment->name}}</p>
            <p class="text-gray-600 mt-2">График работы: {{$employer->schedule->name}}</p>
        </div>
    </div>
    @include('layout.footer')
@endsection
