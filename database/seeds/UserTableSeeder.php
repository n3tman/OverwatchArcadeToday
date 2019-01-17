<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->id = 1337;
        $user->battletag = "Google Spreadsheet";
        $user->avatar = "http://icons.iconarchive.com/icons/dtafalonso/android-lollipop/256/Sheets-icon.png";
        $user->group = 0;
        $user->save();
    }
}
