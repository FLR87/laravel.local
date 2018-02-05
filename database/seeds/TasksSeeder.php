<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        while ($i < 10) {
            DB::table('tasks')->insert([
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'task' => str_random(50)
            ]);
            $i++;
        }
    }
}
