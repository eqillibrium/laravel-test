<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private array $categories = [
        'наука',
        'спорт',
        'технологии',
        'политика',
        'искусство',
        'экономика',
        'кино',
        'медицина',
        'общество',
        'культура'
    ];

    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0; $i < 10; $i++)
        {
            $data[] = [
                'title'       => $this->categories[$i],
                'description' => $faker->text(mt_rand(100,200)),
                'updated_at'  => now(),
                'created_at'  => now()
            ];
        }
        return $data;
    }
}
