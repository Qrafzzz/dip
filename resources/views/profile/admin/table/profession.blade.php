<div class="m-auto p-10">
    <table class="" style="border: solid 1px; display: inline-block" >
        <td>ID</td>
        <td>Название</td>
        <td>Категория</td>
        <td>Действия</td>
        @foreach($professions as $profession)
            <div class="">
                <tr>
                    <td>
                        <div class="">
                            {{$profession->id}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$profession->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$profession->category->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <button><a href="{{ route("editProfession", $profession->name) }}">Изменить</a></button>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <button><a href="{{ route("removeProfession", $profession->id) }}">Удалить</a></button>
                        </div>
                    </td>
                </tr>
            </div>
        @endforeach
    </table>
</div>

