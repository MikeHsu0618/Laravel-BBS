<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //生成數據集合，factory(User::class)根據指定的User生成模型工廠構造器，對應加載UserFactory.php中的工廠設置。
        $users = factory(User::class)->times(10)->create();

        $user =User::find(1);
        $user->name = 'Summer';
        $user->email = 'summer@example.com';
        $user->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();

    }
}
