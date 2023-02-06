<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            "Html",
            "Css",
            "Javascript",
            "Php"
        ];
        foreach($data as $dato){
            $type=new Type();
            $type->name=$dato;
            $type->save();

        }
    }
}
