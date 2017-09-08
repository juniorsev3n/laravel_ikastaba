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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'nama_lengkap' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
        'jurusan' => rand(1,4),
        'angkatan' => rand(1999,2017),
        'alamat' => $faker->address,
        'kotakab' => $faker->city,
        'propinsi' => $faker->state,
        'kodepos' => $faker->postcode,
        'telepon' => $faker->phoneNumber,
        'nohp' => $faker->phoneNumber,
        'avatar' => rand().'png',
        'status' => 1,
        'is_admin' => 0,
    ];
});
