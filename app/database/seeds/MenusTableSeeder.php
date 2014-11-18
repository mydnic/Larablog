<?php 

class MenusTableSeeder extends Seeder {

    public function run()
    {
        Menu::truncate();

        Menu::create(array(
            'name'   => 'Home',
            'uri'    => '/',
            'weight' => '1',
        ));

        Menu::create(array(
            'name'   => 'Blog',
            'uri'    => '/blog',
            'weight' => '2',
        ));
    }
}