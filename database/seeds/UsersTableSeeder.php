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
        // 初始化用戶角色，將 1 号用戶指派为『站長』
        $user->assignRole('Founder');

        // 將 2 号用戶指派為『管理員』
        $user = User::find(2);
        $user->assignRole('Maintainer');

    }
}
