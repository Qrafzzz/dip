<div class="text-xl flex flex-col md:flex-row items-center justify-around px-4 md:px-8 py-2 md:py-4 bg-gradient-to-r from-bgblu to-bgfil">
    <div class="flex items-center">
        <a href="{{ route("home") }}">
            <div class="flex items-center text-xl sm:text-lg md:text-4xl">
                <img class="h-12 sm:h-12 md:h-16 lg:h-20 mr-2 md:mr-4" src="/storage/logo/logo.png" alt="Логотип">
                <span class="text-base sm:text-xl md:text-2xl">ProgNet</span>
            </div>
        </a>
    </div>
    <div class="flex flex-col md:flex-row items-center justify-center mt-4 md:mt-0 text-lg sm:text-base">
        <form method="GET" action="{{ route('employer.index')}}" class="flex items-center">
            <input class="w-40 sm:w-48 md:w-52 lg:w-96 py-1 px-3 text-sm md:text-base lg:text-lg rounded-l-full" type="text" name="search" @if(isset($_GET['search'])) value="{{$_GET['search']}}" @endif placeholder="Поиск резюме">
            <button class="w-20 sm:w-20 md:w-20 lg:w-20 bg-white py-1 px-3 text-sm md:text-base lg:text-lg ml-1 rounded-r-full" type="submit">Найти</button>
        </form>
    </div>
    <div class="flex flex-col md:flex-row items-center mt-4 md:mt-0 md:ml-4 text-lg sm:text-base justify-end">
        @guest("web")
            <a class="mr-4 text-sm md:text-base lg:text-lg" href="{{ route("register") }}">Создать резюме</a>
            <a class="text-sm md:text-base lg:text-lg" href="{{ route("login") }}">Войти</a>
        @endguest
        @auth("web")
                <a class="mr-4 text-sm md:text-base lg:text-lg" href="{{ route("profile") }}">Профиль</a>
                <a class="text-sm md:text-base lg:text-lg" href="{{ route("logout") }}">Выйти</a>
        @endauth
    </div>
</div>

{{--@guest("web")--}}
{{--    <a href="{{ route("register") }}">Создать резюме</a>--}}
{{--    <a href="{{ route("registerWorker") }}">Разместить вакансию</a>--}}
{{--    <a href="{{ route("login") }}">Войти</a>--}}
{{--@endguest--}}
