<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

   
    {
        $user=User::factory()->create([
            'name'=>"mazza badreddine",
            'email'=>"mazza@gmail.com"
           ]);
   
           Listing::factory(5)->create([
               'user_id'=>$user->id,
               
           ]);
    }
}
