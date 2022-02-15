<?php

namespace Database\Seeders;

use App\Models\EBook;
use Illuminate\Database\Seeder;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EBook::create([
            'title'=>'Wakanda',
            'author' => 'Tchalla',
            'description' => 'Buku yang menceritakan wakanda.'
        ]);

        EBook::create([
            'title'=>'LoL guideBook',
            'author' => 'Riot',
            'description' => 'Buku yang mengajarkan bagaimana cara main LoL.'
        ]);

        EBook::create([
            'title'=>'MIB',
            'author' => 'saksa',
            'description' => 'Buku yang menceritakan Man in Black.'
        ]);

        EBook::create([
            'title'=>'WEMIN',
            'author' => 'William',
            'description' => 'Buku yang menceritakan tentang WEMIN.'
        ]);

        EBook::create([
            'title'=>'KASUS KASUR',
            'author' => 'Ajo',
            'description' => 'Buku yang menceritakan tentang cinta terlarang.'
        ]);

        EBook::create([
            'title'=>'Ngoding Menderitakan',
            'author' => 'James',
            'description' => 'Memberitahu berapa menyiksakan coding.'
        ]);

        EBook::create([
            'title'=>'Walaw',
            'author' => 'Santo',
            'description' => 'Buku yang mengajari bahasa WALAW.'
        ]);

        EBook::create([
            'title'=>'Capek',
            'author' => 'Raditya',
            'description' => 'Novel yang berisi kelu kesah Radit ke kuliahnya.'
        ]);
    }
}
