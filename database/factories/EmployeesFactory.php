<?php

use Faker\Generator as Faker;
use App\Models\Employee;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'firstname' => 'admin',
        'lastname' => '',
        'gender' => $faker-> randomElement(['man','woman']),
        'phone' => $faker-> phoneNumber(),
        'country' => 'indonesian',
        'city' => $faker-> city(),
        'postalcode' => $faker-> postcode(),
        'address' => $faker-> address(),
    ];
});
