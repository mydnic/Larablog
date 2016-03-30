<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    public function run()
    {
        Menu::truncate();

        Menu::create([
            'name'        => 'Home',
            'url'         => route('home'),
            'weight'      => '1',
            'emplacement' => 'left',
        ]);

        Menu::create([
            'name'        => 'Blog',
            'url'         => route('post.index'),
            'weight'      => '2',
            'emplacement' => 'left',
        ]);

        Menu::create([
            'name'          => 'Login',
            'url'           => url('login'),
            'is_login_link' => true,
            'weight'        => '0',
            'emplacement'   => 'right',
        ]);
    }
}
