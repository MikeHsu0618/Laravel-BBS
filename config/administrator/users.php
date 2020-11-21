<?php

use App\Models\User;

return [
    // 頁面標题
    'title'   => '用戶',

    // 模型單數，用作頁面『新建 $single』
    'single'  => '用戶',

    // 數据模型，用作數据的 CRUD
    'model'   => User::class,

    // 设置当前頁面的访问权限，通过返回布尔值来控制权限。
    // 返回 True 即通过权限验证，False 则无权访问并从 Menu 中隐藏
    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
    },

    // 字段负责渲染『數据表格』，由无數的『列』组成，
    'columns' => [

        // 列的標示，这是一个最小化『列』信息配置的例子，读取的是模型里对应
        // 的属性的值，如 $model->id
        'id',

        'avatar' => [
            // 數据表格里列的名称，默認會使用『列標识』
            'title'  => '頭像',

            // 默認情况下會直接输出數据，你也可以使用 output 选项来定制输出内容
            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
            },

            // 是否允许排序
            'sortable' => false,
        ],

        'name' => [
            'title'    => '用戶名',
            'sortable' => false,
            'output' => function ($name, $model) {
                return '<a href="/users/'.$model->id.'" target=_blank>'.$name.'</a>';
            },
        ],

        'email' => [
            'title' => '信箱',
        ],

        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    // 『模型表單』设置项
    'edit_fields' => [
        'name' => [
            'title' => '用戶名',
        ],
        'email' => [
            'title' => '信箱',
        ],
        'password' => [
            'title' => '密码',

            // 表單使用 input 类型 password
            'type' => 'password',
        ],
        'avatar' => [
            'title' => '用戶頭像',

            // 设置表單条目的类型，默認的 type 是 input
            'type' => 'image',

            // 图片上传必须设置图片存放路径
            'location' => public_path() . '/uploads/images/avatars/',
        ],
        'roles' => [
            'title'      => '用戶角色',

            // 指定數据的类型为关联模型
            'type'       => 'relationship',

            // 关联模型的字段，用来做关联显示
            'name_field' => 'name',
        ],
    ],

    // 『數据过滤』设置
    'filters' => [
        'id' => [

            // 过滤表單条目显示名称
            'title' => '用戶 ID',
        ],
        'name' => [
            'title' => '用戶名',
        ],
        'email' => [
            'title' => '信箱',
        ],
    ],
];