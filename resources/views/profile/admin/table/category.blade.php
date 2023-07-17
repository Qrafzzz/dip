<div class="m-auto p-10">
    <table class="" style="border: solid 1px; display: inline-block" >
        <td>ID</td>
        <td>Название</td>
        <td>Действия</td>
        @foreach($categories as $category)
            <div class="">
                <tr>
                    <td>
                        <div class="">
                            {{$category->id}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$category->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <button><a href="{{ route("editCategory", $category->name) }}">Изменить</a></button>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            <button><a href="{{ route("removeCategory", $category->id) }}">Удалить</a></button>
                        </div>
                    </td>
                </tr>
            </div>
        @endforeach
    </table>
</div>

