<div class="m-auto p-10">
    <table class="" style="border: solid 1px; display: inline-block" >

        <td class="">Превью</td>
        <td>название</td>
        <td>Профессия</td>
        <td>Зарплата</td>
        <td>Город</td>
        <td>Адресс</td>
        <td>Опыт работы</td>
        <td>Описание</td>
        <td>Тип занятости</td>
        <td>График</td>
        <td>Автор</td>

        @foreach($companies as $company)
            <div class="">
                <tr>
                    <td>
                        <div class="">
                            {{$company->preview}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->profession->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{ $company->min_wages }} @isset($company->min_wages)
                                - {{ $company->max_wages }}
                            @endisset
                            <span>Руб.</span>
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->city->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->address}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->experience->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->description}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->employment->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->schedule->name}}
                        </div>
                    </td>
                    <td>
                        <div class="">
                            {{$company->user->surname}} {{$company->user->name}}
                        </div>
                    </td>
                </tr>
            </div>
        @endforeach
    </table>
</div>
