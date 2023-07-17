@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.header')
<div class="pl-10 flex flex-col md:flex-row items-center justify-around px-4 md:px-8 py-2 md:py-4">
    <form action="{{ route("updateUserSubmit", $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex-grow">
            <div class="pb-2">
                <label>Имя:</label><br>
        <input class="border-solid border-b-2 border-b-lime-300" value="{{$user->name}}" name="name" type="text" placeholder="name"/>

        @error('name')
        {{$message}}
        @enderror
            </div>
            <div class="pb-2">
                <label>Фамилия:</label><br>
        <input class="border-solid border-b-2 border-b-lime-300" value="{{$user->surname}}" name="surname" type="text" placeholder="surname"/>

        @error('surname')
        {{$message}}
        @enderror
            </div>
            <div class="pb-2">
                <label>Email:</label><br>
        <input class="border-solid border-b-2 border-b-lime-300" value="{{$user->email}}" name="email" type="email" placeholder="email"/>

        @error('email')
        {{$message}}
        @enderror
            </div>
            <div class="pb-2">
                <label>Роль:</label><br>
        <select name="role_id">
            @foreach($roles as $role)
                <option @if($role->id === $user->role_id) selected @endif value="{{ $role->id }}" > {{ $role->name }} </option>
            @endforeach
        </select>
            </div>
        @error('role_id')
        {{$message}}
        @enderror
        </div>
        <button type="submit">Обновить</button>
    </form>

</div>

@endsection
