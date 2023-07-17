<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\City;
use App\Models\Employment;
use App\Models\Experience;
use App\Models\Gender;
use App\Models\Profession;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Type_of_employment;
use App\Models\User;
use App\Models\Work_schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $names = ['Работник', 'Работодатель', 'Админ'];
        foreach ($names as $name) {
            Role::factory(1)->create([
                "name" => $name,
            ]);
        }

        $genders = ['Мужской', 'Женский'];
        foreach ($genders as $gender) {
            Gender::factory(1)->create([
                "name" => $gender,
            ]);
        }

        $categories = ['Backend', 'Frontend'];
        foreach ($categories as $category){
            Category::factory(1)->create([
                "name" => $category,
            ]);
        }

        $professions = ['PHP разработчик'];
        foreach ($professions as $profession) {
            Profession::factory(1)->create([
                "name" => $profession,
                "category_id" => 1,
            ]);
        }

        $professions = ['JavaScript разработчик', 'HTML разработчик'];
        foreach ($professions as $profession) {
            Profession::factory(1)->create([
                "name" => $profession,
                "category_id" => 2,
            ]);
        }

        $experiences = ['Не имеет значения', 'Нет опыта', 'От 1 года до 3 лет', 'От 3 до 6 лет', 'Более 6 лет'];
        foreach ($experiences as $experience) {
            Experience::factory(1)->create([
                "name" => $experience,
            ]);
        }

        $employments = ['Полная занятость', 'Частичная занятость', 'Стажировка'];
        foreach ($employments as $employment) {
            Employment::factory(1)->create([
                "name" => $employment,
            ]);
        }

        $schedules = ['Полный день', 'Сменный график', 'Удаленная работа', 'Гибкий график'];
        foreach ($schedules as $schedule) {
            Schedule::factory(1)->create([
                "name" => $schedule,
            ]);
        }

        $cities = ['Воткинск', 'Глазов', 'Ижевск', 'Камбарка', 'Можга', 'Сарапул'];
        foreach ($cities as $city) {
            City::factory(1)->create([
                "name" => $city,
            ]);
        }




        User::factory(1)->create([
            "name" => "1",
            "surname" => "1",
            "email" => "1@1",
            "role_id" => "3",
            "gender_id" => "1",
            "password" => bcrypt("qweqweqwe"),
            "image" => "default_user.png"
        ]);



    }
}
