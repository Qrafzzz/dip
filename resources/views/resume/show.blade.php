@extends('partials.app')
@section('title', $resume->profession->name)
@section('content')
    @include('layout.headerEmployer')
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
        <img class="w-32 h-32 rounded-full mx-auto" src="/storage/users/{{$resume->user->image}}">
        <h2 class="text-center text-2xl font-semibold mt-3">{{$resume->user->name}} {{$resume->user->surname}}</h2>
        <p class="text-center text-gray-600 mt-1">{{$resume->profession->name}}</p>
        <p class="text-center text-gray-600 mt-1">{{$resume->wage}} <span class="">Руб.</span></p>
        @if(Auth::user()->role_id == 2)
        <form class="text-center font-semibold mt-3" method="GET" action="{{ route("addResponseResume", $resume->id) }}">
            @csrf

            @if(count($companies) > 0)
                Выберите вакансию<br>
                <select class="text-center text-gray-600 mt-1" name="company_id">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->preview}}</option>
                    @endforeach
                </select><br>
            @endif
            <button type="submit">Откликнуться</button>
        </form>
        @endif
        <div class="mt-5">
            <h3 class="text-xl font-semibold">Описание</h3>
            <p class="text-gray-600 mt-2">{{$resume->description}}</p>
            <p class="text-gray-600 mt-2">Опыт работы: {{$resume->experience->name}}</p>
            <p class="text-gray-600 mt-2">Тип занятости: {{$resume->employment->name}}</p>
            <p class="text-gray-600 mt-2">График работы: {{$resume->schedule->name}}</p>
        </div>
    </div>
    @include('layout.footer')
@endsection
