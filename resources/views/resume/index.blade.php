@extends('partials.app')
@section('title', 'Резюме')
@section('content')
    @include('layout.overlay')
    @include('layout.headerEmployer')
    <button class="text-black border border-white bg-white m-2 py-2 px-4 rounded-lg sm:hidden" id="filter-toggle">Фильтр</button>
    <div class="flex flex-row flex-wrap sm:flex-nowrap justify-center mt-5 mb-5">
        <div class="bg-white mr-3 px-4 pt-3 pb-4 sm:pb-0 hidden sm:pb-0 hidden sm:block" id="filter">
            <form method="GET" action="{{ route("resume.index") }}">
                @csrf
                <div>
                    <span class="font-semibold">Профессии:</span>
                    @foreach ($categories as $category)
                        <div class="category pl-2" data-category-id="{{ $category->id }}">
                            <h2>-{{ $category->name }}</h2>
                            @foreach ($category->professions as $profession)
                                <div class="pl-1 profession profession-{{ $category->id }} hidden">
                                    <input type="checkbox" name="professions[]" value="{{ $profession->id }}"
                                           @if(request()->has('professions') && in_array($profession->id, request()->input('professions'))) checked @endif>
                                    <label class="form-check-label">{{ $profession->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    @if ($professions->count() > 5)
                        <div class="">
                            <button type="button" id="show-professions" class="text-blue-400 text-base">Показать
                                остальные
                            </button>
                        </div>
                    @endif
                </div>
                <span class="font-semibold">Города:</span>
                @for ($i = 0; $i < $cities->count(); $i++)
                    @if ($i < 5)
                        <div class="pl-2">
                            <input type="checkbox" name="cities[]" value="{{ $cities[$i]->id }}"
                                   @if(request()->has('cities') && in_array($cities[$i]->id, request()->input('cities'))) checked @endif>
                            <label class="form-check-label">{{ $cities[$i]->name }}</label>
                        </div>
                    @else
                        <div class="hidden pl-2 cities">
                            <input type="checkbox" name="cities[]" value="{{ $cities[$i]->id }}"
                                   @if(request()->has('cities') && in_array($cities[$i]->id, request()->input('cities'))) checked @endif>
                            <label class="form-check-label">{{ $cities[$i]->name }}</label>
                        </div>
                    @endif
                @endfor
                @if ($cities->count() > 5)
                    <div class="">
                        <button type="button" id="show-cities" class="text-blue-400 text-base">Показать
                            остальные
                        </button>
                    </div>
                @endif

                <span class="font-semibold">Опыт работы:</span>
                <div class="">
                    @foreach($experiences as $experience)
                        <div>
                            <input type="checkbox" name="experiences[]" value="{{ $experience->id }}"
                                   @if(request()->has('experiences') && in_array($experience->id, request()->input('experiences'))) checked @endif>
                            <label class="">{{ $experience->name }}</label>
                        </div>
                    @endforeach
                </div>

                <span class="font-semibold">Тип занятости:</span>
                <div class="">
                    @foreach($employments as $employment)
                        <div>
                            <input type="checkbox" name="employments[]" value="{{ $employment->id }}"
                                   @if(request()->has('employments') && in_array($employment->id, request()->input('employments'))) checked @endif>
                            <label class="">{{ $employment->name }}</label>
                        </div>
                    @endforeach
                </div>

                <span class="font-semibold">График работы:</span>
                <div class="">
                    @foreach($schedules as $schedule)
                        <div>
                            <input type="checkbox" name="schedules[]" value="{{ $schedule->id }}"
                                   @if(request()->has('schedules') && in_array($schedule->id, request()->input('schedules'))) checked @endif>
                            <label class="">{{ $schedule->name }}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit">Поиск</button>
            </form>
        </div>
        <script>
            window.onload = function () {
                const toggleButton = document.getElementById('filter-toggle');
                const filter = document.getElementById('filter');

                toggleButton.addEventListener('click', () => {
                    filter.classList.toggle('hidden');
                });
                const categories = document.querySelectorAll('.category');
                categories.forEach((category) => {
                    const categoryHeader = category.querySelector('h2');
                    categoryHeader.addEventListener('click', () => {
                        const professions = category.querySelectorAll(`.profession-${category.dataset.categoryId}`);
                        if (!professions[0].classList.contains('hidden')) {
                            professions.forEach((profession) => {
                                profession.classList.add('hidden');
                            });
                        } else {
                            professions.forEach((profession) => {
                                profession.classList.remove('hidden');
                            });
                        }
                    });
                });

                let showButtonProfessions = document.getElementById('show-professions');
                if (showButtonProfessions) {
                    showButtonProfessions.addEventListener('click', function () {
                        let hiddenProfessions = document.querySelectorAll('.professions.hidden');
                        for (let i = 0; i < hiddenProfessions.length; i++) {
                            hiddenProfessions[i].classList.remove('hidden');
                        }
                        this.style.display = 'none';
                    });
                }

                let showButtonCities = document.getElementById('show-cities');
                if (showButtonCities) {
                    showButtonCities.addEventListener('click', function () {
                        let hiddenCities = document.querySelectorAll('.cities.hidden');
                        for (let i = 0; i < hiddenCities.length; i++) {
                            hiddenCities[i].classList.remove('hidden');
                        }
                        this.style.display = 'none';
                    });
                }

            }
        </script>
        @if(count($resumes))
            <div class="">
                @foreach($resumes as $resume)
                    <div class="flex pl-5 py-2 pr-3 border bg-white">
                        <div class="w-60 px-1 sm:mr-24 md:mr-10 lg:mr-80">
                            <div class="font-bold">
                                <a href="{{ route("resume.show", $resume->author_id) }}">{{ $resume->profession->name }}</a>
                            </div>
                            <div class="wage">
                                {{$resume->wage}} <span class="font-bold">Руб.</span>
                            </div>
                            <div class="city">
                                Город: {{$resume->city->name}}
                            </div>
                            <div class="employment">
                                Тип занятости: {{$resume->employment->name}}
                            </div>
                        </div>
                            <div class="flex h-full w-20 md:w-24 lg:w-32">
                                <img class="m-auto" src="/storage/users/{{$resume->user->image}}">
                            </div>

                    </div>
                @endforeach
                    {{ $resumes->withQueryString()->links() }}
                    @else
                        <p>По запросу ничего не найдено</p>
                    @endif
            </div>
    </div>
    @include('layout.footer')
@endsection
