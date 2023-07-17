@extends('partials.app')
@section('title', 'Профиль')
@section('content')
    @include('layout.headerEmployer')
    <div class="pl-10 flex flex-col md:flex-row items-center justify-around px-4 md:px-8 py-2 md:py-4">
        <form action="{{ route("companyUpdateSubmit", $company->id)}}" method="POST">
            @csrf
            <h2 class="">Ваша вакансия</h2>
            <div class="flex-grow">
                <div class="pb-2">
                    <label>Превью:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{ $company->preview ?? '' }}"
                           name="preview" type="text" placeholder="Название вакансии"/>
                    @error('preview')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Имя:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{ $company->name ?? '' }}"
                           name="name" type="text" placeholder="Название"/>
                    @error('name')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Профессия:</label><br>
                    <select name="profession_id">
                        @foreach($professions as $profession)
                            <option
                                @if(isset($company->profession_id)) @if($profession->id === $company->profession_id) selected
                                @endif @endif value="{{ $profession->id }}">{{ $profession->name }}</option>
                        @endforeach
                    </select>
                    @error('profession_id')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Зарплата:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{ $company->min_wages  ?? ''}}"
                           name="min_wages" type="text" placeholder="От"/>
                    @error('max_wages')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{ $company->max_wages  ?? ''}}"
                           name="max_wages" type="text" placeholder="До"/>
                    @error('min_wages')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Город:</label><br>
                    <select name="city_id">
                        @foreach($cities as $city)
                            <option @if(isset($company->city_id)) @if($city->id === $company->city_id) selected
                                    @endif @endif value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Адресс:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{ $company->address  ?? ''}}"
                           name="address" type="text" placeholder="Адрес"/>
                    @error('address')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Опыт работы:</label><br>
                    <select name="experience_id">
                        @foreach($experiences as $experience)
                            <option
                                @if(isset($company->experience_id)) @if($experience->id === $company->experience_id) selected
                                @endif @endif value="{{ $experience->id }}">{{ $experience->name }}</option>
                        @endforeach
                    </select>
                    @error('experience_id')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Описание:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{ $company->description  ?? ''}}"
                           name="description" type="text" placeholder="Описание"/>
                    @error('description')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>Тип занятости:</label><br>
                    <select name="type_of_employment_id">
                        @foreach($employments as $employment)
                            <option
                                @if(isset($company->type_of_employment_id)) @if($employment->id === $company->type_of_employment_id) selected
                                @endif @endif value="{{ $employment->id }}">{{ $employment->name }}</option>
                        @endforeach
                    </select>
                    @error('type_of_employment_id')
                    {{$message}}
                    @enderror
                </div>

                <div class="pb-2">
                    <label>График работы:</label><br>
                    <select name="schedule_id">
                        @foreach($schedules as $schedule)
                            <option
                                @if(isset($company->schedule_id)) @if($schedule->id === $company->schedule_id) selected
                                @endif @endif value="{{ $schedule->id }}">{{ $schedule->name }}</option>
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
            </div>
        </form>
    </div>
@endsection
