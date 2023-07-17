
<div class="">
    <a href="{{ route("employer.show", $employer->author_id) }}">

        <div class="font-bold">
            {{$employer->preview}}
        </div>
        <div class="profession_id ">
            {{$employer->profession->name}}
        </div>
    </a>
        <div class="">
            {{$employer->max_wages}}
        </div>
        <div class="">
            {{$employer->min_wages}}
        </div>
        <div class="city_id">
            {{$employer->city->name}}
        </div>
        <div class="name">
            {{$employer->name}}
        </div>

</div>
