<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getNews () : array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < mt_rand(5, 10); $i++)
        {
            $data[] = [
                    'title' => $faker->jobTitle(),
                    'description' => $faker->sentence(3),
                    'author' => $faker->name(),
                    'created_at' => now()
                ];
        }
        return $data;
    }
}
