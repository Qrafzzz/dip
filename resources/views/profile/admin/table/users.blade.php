<div class="m-auto p-10">
<table class="" style="border: solid 1px; display: inline-block" >
    <td>ID</td>
    <td>name</td>
    <td>surname</td>
    <td>email</td>
    <td>Пол</td>
    <td>Роль</td>
    <td>Фотография</td>

    @foreach($users as $user)
        <div class="users">
            <tr>
                <td>
                    <div class="">
                        {{$user->id}}
                    </div>
                </td>
                <td>
                    <div class="name">
                        {{$user->name}}
                    </div>
                </td>
                <td>
                    <div class="surname">
                        {{$user->surname}}
                    </div>
                </td>
                <td>
                    <div class="email">
                        {{$user->email}}
                    </div>
                </td>
                <td>
                    <div class="gender_id">
                        {{$user->gender->name}}
                    </div>
                </td>
                <td>
                    <div class="role_id">
                        {{$user->role->name}}
                    </div>
                </td>
                <td>
                    <div class="image">
                        <img style="width: 100px" max-height="100px" class="" src="/storage/users/{{$user->image}}">
                    </div>
                </td>
                <td>
                    <div>
                        <button><a href="{{ route("editUser", $user->email) }}">Изменить</a></button>
                    </div>
                </td>
            </tr>
        </div>
    @endforeach
</table>
</div>
