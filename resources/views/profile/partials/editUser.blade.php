
    <div class="pl-10 ">
        <form action="{{ route("profileUpdate", $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex-grow">
                <div class="pb-2">

                    <img style="width: 150px" src="/storage/users/{{$user->image}}">
                    <input value="{{$user->image}}" name="image" type="file" placeholder="image"/>
                    @error('image')
                    {{$message}}
                    @enderror
                </div>
                <div class="pb-2">
                    <label>Имя:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{$user->name}}" name="name" type="text" placeholder="name"/>
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div class="pb-2">
                    <label>Фамилия:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{$user->surname}}" name="surname" type="text" placeholder="surname"/>
                    @error('surname')
                    {{$message}}
                    @enderror
                </div>
                <div class="pb-2">
                    <label>Email:</label><br>
                    <input class="border-solid border-b-2 border-b-lime-300" value="{{$user->email}}" name="email" type="email" placeholder="email"/>
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
                <div class="pb-2">
                    <label>Пол:</label><br>
                    <select name="gender_id">
                        @foreach($genders as $gender)
                            <option @if($gender->id === $user->gender_id) selected @endif value="{{ $gender->id }}" > {{ $gender->name }} </option>
                        @endforeach
                    </select>
                    @error('gender_id')
                    {{$message}}
                    @enderror
                </div>
                @error('role_id')
                {{$message}}
                @enderror
                <button class="pb-2" type="submit">Обновить</button>
            </div>
        </form>

    </div>



