<div class="m-auto p-10 ">
    <table class="" style="border: solid 1px; display: inline-block" >
        <td>ID</td>
        <td>Название</td>
        <td>Действия</td>
        @foreach($cities as $city)
            <div class="">
                <tr>
                    <td>
                        <div class="">
                            {{$city->id}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$city->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <button><a href="{{ route("editCity", $city->name) }}">Изменить</a></button>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <button><a href="{{ route("removeCity", $city->id) }}">Удалить</a></button>
                        </div>
                    </td>
                </tr>
            </div>
        @endforeach
    </table>
</div>

