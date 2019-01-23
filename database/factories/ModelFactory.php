<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


// User
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(rand(32, 10)), //campo bases de datos
        'user_name' => $faker->unique()->safeEmail,
        'email' => $faker->unique()->safeEmail,
        'password' => '123456',
        'api_token' => str_random(60)];
});

/*
// Professional
$factory->define(App\Professional::class, function (Faker\Generator $faker) {
    return [
        'identity' => str_random(10),
        'first_name' => str_random(10),
        'last_name' => str_random(10),
        'email' => $faker->unique()->safeEmail,
        'nationality' => str_random(10),
        'civil_state' => str_random(10),
        'birthdate' => '2018-10-01',
        'gender' => str_random(10),
        'phone' => str_random(10),
        'address' => str_random(10),
        'state' => str_random(10),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

//Account
$factory->define(App\Account::class, function (Faker\Generator $faker) {
    return [
        'user_name' => str_random(10),
        'email' => $faker->unique()->safeEmail,
        'alternative_email' => str_random(10),
        'password' => str_random(10),
        'user_id' => function () {
            return factory(App\Account::class)->create()->id;
        }
    ];
});

// Role
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'id_person' => $faker->text(rand(32, 10)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

// People
$factory->define(App\Person::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
        'person_id' => function () {
            return factory(App\Person::class)->create()->id;
        }
    ];
});

//System
$factory->define(App\System::class, function (Faker\Generator $faker) {
    return [
        'system_name' => str_random(10),
        'id_status' => function () {
            return factory(App\Status::class)->create()->id;
        }
    ];
});

//Status

$factory->define(App\State::class, function (Faker\Generator $faker) {
    return [
        'status_people' => str_random(10),
        'status_system' => str_random(10),

    ];
});

//Resource

$factory->define(App\Resource::class, function (Faker\Generator $faker) {
    return [
        'url' => str_random(10),

    ];
});
