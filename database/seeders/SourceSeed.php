<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class SourceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private array $sources = [
        'ABYZ News Links',
        'Agence France Presse (AFP)',
        'BBC News',
        'CNN.com',
        'Euronews',
        'Reuters',
        'World News',
        'Bloomberg',
        'Daily News',
        'The New York Times'
    ];

    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0; $i < 10; $i++)
        {
            $data[] = [
                'title'       => $this->sources[$i],
                'description' => $faker->text(mt_rand(100,200)),
                'updated_at'  => now(),
                'created_at'  => now()
            ];
        }
        return $data;
    }
}
