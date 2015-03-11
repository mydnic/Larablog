<?php 

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder {

    public function run()
    {
        Setting::truncate();

        Setting::create(array(
            'app_name'     => 'Larablog',
            'app_baseline' => 'My cool personnal website',
            'theme'        => 'bootstrap3',
        ));
    }
}