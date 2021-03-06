<?php

use Faker\Generator as Faker;
use App\Models\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'firstname' => $faker-> firstName(),
        'lastname' => $faker-> lastName(),
        'gender' => $faker-> randomElement(['man','woman']),
        'phone' => $faker-> phoneNumber(),
        'country' => 'indonesian',
        'city' => $faker-> city(),
        'postalcode' => $faker-> postcode(),
        'address' => $faker-> address(),
    ];
});
