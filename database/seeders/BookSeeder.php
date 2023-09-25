<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelBook;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //para popular automaticamente o db:
     public function run(ModelBook $book)
    {
        $book->create([
            'title'=>'O senhor dos anéis',
            'pages'=>'200',
            'price'=>'100.00',
            'id_user'=>'1',
        ]);

        $book->create([
            'title'=>'Pets',
            'pages'=>'70',
            'price'=>'40.00',
            'id_user'=>'2',
        ]);

        $book->create([
            'title'=>'IA',
            'pages'=>'50',
            'price'=>'50.00',
            'id_user'=>'3',
        ]);
    }
}
