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
        <div class="pl-2">
            <h2 class="">Ваше резюме</h2>
            <form action="{{ route("updateResume")}}" method="POST">
                @csrf
                <div class="pb-2">
                    <label>Профессия</label><br>
                    <select name="profession_id">
                        @foreach($professions as $profession)
                            <option @if(isset($resume->profession_id)) @if($profession->id === $resume->profession_id) selected @endif @endif value="{{ $profession->id}}">{{ $profession->name }}</option>
                        @endforeach
                    </select><br>

                    @error('profession_id')
                    {{$message}}
                    @enderror
                </div>
                <div class="pb-2">
                    <label>Зарплата</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{ $resume->wage ?? '' }}" name="wage" type="text"/><br>
                    <div class="text-red-400">
                        @error('wage')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="pb-2">
                    <label>Город</label><br>
                    <select name="city_id">
                        @foreach($cities as $city)
                            <option @if(isset($resume->city_id)) @if($city->id === $resume->city_id) selected @endif @endif value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>

                    @error('city_id')
                    {{$message}}
                    @enderror
                </div>
                <div class="pb-2">
                    <label>Опыт работы</label><br>
                    <select name="experience_id">
                        @foreach($experiences as $experience)
                            <option @if(isset($resume->experience_id)) @if($experience->id === $resume->experience_id) selected @endif @endif value="{{ $experience->id }}">{{ $experience->name }}</option>
                        @endforeach
                    </select>

                    @error('experience_id')
                    {{$message}}
                    @enderror
                </div>
                <div class="pb-2">
                    <label>Напишите где раньше работали</label><br>
                    <textarea class="border-solid border-b-2 border-b-lime-300" name="description" type="text">{{ $resume->description  ?? ''}}</textarea><br>
                    <div class="text-red-400">
                        @error('description')
                        {{$message}}
                        @enderror
                    </div>

                </div>
                <div class="pb-2">
                    <label>Тип занятости</label><br>
                    <select name="type_of_employment_id">
                        @foreach($employments as $employment)
                            <option @if(isset($resume->type_of_employment_id)) @if($employment->id === $resume->type_of_employment_id) selected @endif @endif value="{{ $employment->id }}">{{ $employment->name }}</option>
                        @endforeach
                    </select>
                    <div class="text-red-400">
                        @error('type_of_employment_id')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="pb-2">
                    <label>График работы</label><br>
                    <select name="schedule_id">
                        @foreach($schedules as $schedule)
                            <option @if(isset($resume->schedule_id)) @if($schedule->id === $resume->schedule_id) selected @endif @endif value="{{ $schedule->id }}">{{ $schedule->name }}</option>
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
    @include('layout.footer')
@endsection

