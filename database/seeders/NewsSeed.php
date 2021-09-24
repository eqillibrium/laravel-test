<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private array $news = [
        'Илон Маск высадился на планете Тессия - его встретила дип. миссия Азари',
        'В машинах времени из Северной Кореи нашли баг - случайно закидывает в Советский Союз',
        'Профессиональные сноубордисты из Конго одержали верх на Марсианском чемпионате',
        'Латвия запонтентовала лекарство от рака - 38ое по счету в мире',
        'Джетпак Сбербанка отключается в полете за неуплату. С МТС то же самое',
        'Профессор Чукотского Галактического Университета изобрел кибер-строганину',
        'Найдена нефть на планете Нибиру - ожидается приход новой демократии',
        'Биткоин побил исторический максимум - 30 рублей за штуку',
        'Спектакль Дураки и Дороги становится мировым бестселлером',
        'Олигархам Сырьевой Империи наконец удалось выяснить, кому жить хорошо и зачем жить вообще'
    ];

    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for($i = 0; $i < 10; $i++)
        {
            $data[] = [
                'category_id' => mt_rand(1,10),
                'source_id'   => mt_rand(1,10),
                'title'       => $this->news[$i],
                'author'      => $faker->lastName(),
                'description' => $faker->text(mt_rand(100,200)),
                'updated_at'  => now(),
                'created_at'  => now()
            ];
        }
        return $data;
    }
}
