<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table((new User())->getTable())->truncate();
        DB::table((new Profile())->getTable())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->createUsers();
        $this->createProfiles();
    }

    private function createUsers()
    {
        $modelData = [
            [
                'name'       => 'Felipe',
                'lastname'   => 'Dominguesche',
                'email'      => 'fe.dominguesche@gmail.com',
                'login'      => 'feeh27',
                'password'   => app('hash')->make('123456'),
                'profile_id' => 1,
            ],
            [
                'name'     => 'Murilo',
                'lastname' => 'Pucci',
                'email'    => 'murilohpucci@gmail.com',
                'login'    => 'mhpucci',
                'password' => app('hash')->make('123456'),
            ],
            [
                'name'       => 'Wellington',
                'lastname'   => 'Roque',
                'email'      => 'wellington.roque@gmail.com',
                'login'      => 'roque',
                'password'   => app('hash')->make('123456'),
                'profile_id' => 2,
            ],
            [
                'name'     => 'Henrique',
                'lastname' => 'IoT',
                'email'    => 'henrique.iot@gmail.com',
                'login'    => 'henrique',
                'password' => app('hash')->make('123456'),
            ],
        ];

        foreach ($modelData as $data) {
            User::create($data);
        }
    }

    private function createProfiles()
    {
        $modelData = [
            ['name' => 'Admin',],
            ['name' => 'Moderator',],
            ['name' => 'User',],
        ];

        foreach ($modelData as $data) {
            Profile::create($data);
        }
    }


}
