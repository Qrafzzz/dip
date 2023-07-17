@guest("web")
    <div class="bg-gray-100">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center text-blue-400 text-xs sm:text-sm py-2 px-4 sm:px-8 lg:px-16">
                <div class="flex space-x-2 mb-2 md:mb-0">
                    <a class="" href="{{ route('home') }}">Соискателям</a>
                    <a class="" href="{{ route('employer') }}">Работодателям</a>
                </div>
                <div class="space-x-2 flex">
                    <a class="" href="{{ route('register') }}">Создать резюме</a>
                    <a class="" href="{{ route('registerWorker') }}">Разместить вакансию</a>
                </div>
            </div>
        </div>
    </div>

@endguest
{{--        @auth("web")--}}
{{--            <a href="{{ route("logout") }}">Выйти</a>--}}
{{--            <a href="{{ route("profile") }}">Профиль</a>--}}
{{--            {{auth()->user()->role->name}}--}}
{{--        @endauth--}}
