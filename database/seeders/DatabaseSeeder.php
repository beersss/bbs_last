<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $user1 = User::findOrFail(1);
        $user1->name = '超级管理员';
        $user1->phone = '13521009090';
        $user1->save();
        $user2 = User::findOrFail(2);
        $user2->name = '喜马拉雅';
        $user2->phone = '13521009091';
        $user2->save();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
