<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diningTables = collect([
            [
                'table_number' => '1'
            ],
            [
                'table_number' => '2'
            ],
            [
                'table_number' => '3'
            ],
            [
                'table_number' => '4'
            ],
            [
                'table_number' => '5'
            ],
            [
                'table_number' => '6'
            ],
            [
                'table_number' => '7'
            ],
            [
                'table_number' => '8'
            ],
            [
                'table_number' => '9'
            ],
            [
                'table_number' => '10'
            ],
        ]);

        $diningTables->each(function($table){
            Table::create($table);
        });
    }
}
