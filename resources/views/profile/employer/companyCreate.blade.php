@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.headerEmployer')
    <div class="flex flex-col md:flex-row md:items-start pt-5 p-80">
        <div class="mb-4 md:mb-0 mx-5">
            <a href="{{ route("profile") }}">Профиль</a><br>
            <a href="{{ route("companyRemove") }}">Создать вакансию</a><br>
            <a href="{{ route("companyAll") }}">Все вакансии</a><br>
            <a href="{{ route("profileResumeEm") }}">Отклики на резюме</a><br>
            <a href="{{ route("profileCompanyEm") }}">Отклики на Вашу вакансию</a>
        </div>
        <div class="pl-2">
            <h2>Создание вакансии</h2>
            <form action="{{ route("createCompany")}}" method="POST">
                @csrf
                <div>
                    <label>Название вакансии</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" name="preview" type="text" placeholder="Название вакансии"/>

                    @error('preview')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <label>Название компании</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" name="name" type="text" placeholder="Название"/>

                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <select name="profession_id">

                        @foreach($professions as $profession)
                            <option value="{{ $profession->id}}">{{ $profession->name }}</option>
                        @endforeach
                    </select>
                    @error('profession_id')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <label>Зарплата</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" name="min_wages" type="text" placeholder="От"/>

                    @error('max_wages')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <input class="border-solid border-b-2 border-b-lime-300" name="max_wages" type="text" placeholder="До"/>

                    @error('min_wages')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <select name="city_id">
                        @foreach($cities as $city)
                            <option value="{{ $city->id}}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <label>Адрес</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" name="address" type="text" placeholder="Адрес"/>

                    @error('address')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <select name="experience_id">
                        @foreach($experiences as $experience)
                            <option value="{{ $experience->id}}">{{ $experience->name }}</option>
                        @endforeach
                    </select>

                    @error('experience_id')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <label>Описание</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" name="description" type="text" placeholder="Описание"/>

                    @error('description')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <select name="type_of_employment_id">
                        @foreach($employments as $employment)
                            <option value="{{ $employment->id}}">{{ $employment->name }}</option>
                        @endforeach
                    </select>
                    @error('type_of_employment_id')
                    {{$message}}
                    @enderror
                </div>
                <div>
                    <select name="schedule_id">
                        @foreach($schedules as $schedule)
                            <option value="{{ $schedule->id}}">{{ $schedule->name }}</option>
                        @endforeach
                    </select>

                    @error('schedule_id')
                    {{$message}}
                    @enderror
                </div>
                @error('author_id')
                {{$message}}
                @enderror

                <button type="submit">Сохранить и выложить</button>
            </form>
        </div>
    </div>
@endsection
