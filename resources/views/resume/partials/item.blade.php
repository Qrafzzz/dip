<div class="flex">
    <div class="resume">
        <a href="{{ route("resume.show", $resume->author_id) }}">
            <div class="profession">
                Профессия
                {{$resume->profession->name}}
            </div>
            <div class="wage">
                Зарплата
                {{$resume->wage}} <span class="font-bold">Руб.</span>
            </div>
            <div>
                <img class="h-32" src="/storage/users/{{$resume->user->image}}">
            </div>
        </a>
    </div>
</div>

