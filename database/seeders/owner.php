<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class owner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\owner::factory(10)->create();

        \App\Models\owner::factory()->create([
            'name' => 'Code with Bahri',
            'email' => 'sahrul@fic10.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
