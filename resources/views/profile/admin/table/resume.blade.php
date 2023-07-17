<div class="m-auto p-10">
    <table class="" style="border: solid 1px; display: inline-block" >

        <td>Профессия</td>
        <td>Зарплата</td>
        <td>Описание</td>
        <td>Город</td>
        <td>Опыт работы</td>
        <td>Тип занятости</td>
        <td>График</td>
        <td>Автор</td>

        @foreach($resumes as $resume)
            <div class="">
                <tr>
                    <td>
                        <div class="">
                            {{$resume->profession->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{ $resume->wage }}
                            <span>Руб.</span>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$resume->description}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$resume->city->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$resume->experience->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$resume->employment->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$resume->schedule->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$resume->user->surname}} {{$resume->user->name}}
                        </div>
                    </td>
                </tr>
            </div>
      @endforeach
    </table>
</div>
