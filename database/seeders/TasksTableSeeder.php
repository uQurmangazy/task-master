<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            ['title' => 'Task 1', 'description' => 'Description for task 1', 'status_id' => 1, 'due_date' => Carbon::now()->addDays(1)],
            ['title' => 'Task 2', 'description' => 'Description for task 2', 'status_id' => 2, 'due_date' => Carbon::now()->addDays(2)],
            ['title' => 'Task 3', 'description' => 'Description for task 3', 'status_id' => 3, 'due_date' => Carbon::now()->addDays(3)],
            ['title' => 'Task 4', 'description' => 'Description for task 4', 'status_id' => 1, 'due_date' => Carbon::now()->addDays(4)],
            ['title' => 'Task 5', 'description' => 'Description for task 5', 'status_id' => 2, 'due_date' => Carbon::now()->addDays(5)],
            ['title' => 'Task 6', 'description' => 'Description for task 6', 'status_id' => 3, 'due_date' => Carbon::now()->addDays(6)],
            ['title' => 'Task 7', 'description' => 'Description for task 7', 'status_id' => 1, 'due_date' => Carbon::now()->addDays(7)],
            ['title' => 'Task 8', 'description' => 'Description for task 8', 'status_id' => 2, 'due_date' => Carbon::now()->addDays(8)],
            ['title' => 'Task 9', 'description' => 'Description for task 9', 'status_id' => 3, 'due_date' => Carbon::now()->addDays(9)],
            ['title' => 'Task 10', 'description' => 'Description for task 10', 'status_id' => 1, 'due_date' => Carbon::now()->addDays(10)],
        ];

        DB::table('tasks')->insert($tasks);
    }
}
