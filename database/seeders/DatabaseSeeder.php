<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Course::factory()->create();
        Lesson::factory(27)->create();      
        User::factory(4)->create(['admin' => 1]);
        
        $lessons = Lesson::all();
        
        User::factory(50)
             ->create()
             ->each(function($user) use ($lessons){

                $user->lessons()->attach( $lessons->random(rand(1,27)) );  
            });
                                                                    
    }
}
