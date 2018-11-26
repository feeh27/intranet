<?php

use App\Domain\Auth\User\User;
use App\Domain\Auth\Profile\Profile;
use App\Domain\Auth\GroupModule\GroupModule;
use App\Domain\Auth\Module\Module;
use App\Domain\Auth\Method\Method;
use App\Domain\Auth\GroupProfile\GroupProfile;
use App\Domain\Auth\Group\Group;
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
        DB::table((new GroupModule())->getTable())->truncate();
        DB::table((new Module())->getTable())->truncate();
        DB::table((new Method())->getTable())->truncate();
        DB::table((new GroupProfile())->getTable())->truncate();
        DB::table((new Group())->getTable())->truncate();
        DB::table((new User())->getTable())->truncate();
        DB::table((new Profile())->getTable())->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->createUsers();
        $this->createProfiles();
        $this->createGroups();
        $this->createGroupProfile();
        $this->createMethods();
        $this->createModules();
        $this->createGroupModule();
    }

    private function createProfiles()
    {
        $modelData = [
            ['name' => 'test' , 'label' => 'Tests',    ], //id 1
            ['name' => 'admin', 'label' => 'Admin',    ], //id 2
            ['name' => 'mod'  , 'label' => 'Moderator',], //id 3
            ['name' => 'user' , 'label' => 'User',     ], //id 4
        ];

        foreach ($modelData as $data) {
            Profile::create($data);
        }
    }

    private function createUsers()
    {
        $modelData = [
            [
                'name'       => 'Token',
                'lastname'   => 'Token',
                'email'      => 'token@gmail.com',
                'login'      => 'token',
                'password'   => app('hash')->make('123456'),
                'profile_id' => 1,
            ],
            [
                'name'       => 'User1',
                'lastname'   => 'Unknown',
                'email'      => 'user1@gmail.com',
                'login'      => 'user1',
                'password'   => app('hash')->make('123456'),
                'profile_id' => 2,
            ],
            [
                'name'       => 'User2',
                'lastname'   => 'Unknown',
                'email'      => 'user2@gmail.com',
                'login'      => 'user2',
                'password' => app('hash')->make('123456'),
            ],
            [
                'name'       => 'User3',
                'lastname'   => 'Unknown',
                'email'      => 'user3@gmail.com',
                'login'      => 'user3',
                'password'   => app('hash')->make('123456'),
                'profile_id' => 3,
            ],
            [
                'name'       => 'User4',
                'lastname'   => 'Unknown',
                'email'      => 'user4@gmail.com',
                'login'      => 'user4',
                'password' => app('hash')->make('123456'),
            ],
        ];

        foreach ($modelData as $data) {
            User::create($data);
        }
    }

    private function createGroups()
    {
        $modelData = [
            ['name' => 'users_mod'  , 'label' => 'Permissão de moderador para gerenciamento de usuários'], //id 1
            ['name' => 'users_user' , 'label' => 'Permissão de usuário para gerenciamento de usuários'  ], //id 2
        ];
        foreach ($modelData as $data) {
            Group::create($data);
        }
    }

    private function createGroupProfile()
    {
        $modelData = [
            ['group_id' => 1, 'profile_id' => 3],// Grupo Users Mod   -> Perfil Mod  //id 1
            ['group_id' => 2, 'profile_id' => 4],// Grupo Users User  -> Perfil User //id 2
        ];
        foreach ($modelData as $data) {
            GroupProfile::create($data);
        }
    }

    private function createMethods()
    {
        $modelData = [
            ['name' => 'get'    , 'label' => 'Listar'   , 'url' => ''       ], //id 1
            ['name' => 'create' , 'label' => 'Inserir'  , 'url' => 'create' ], //id 2
            ['name' => 'update' , 'label' => 'Atualizar', 'url' => 'edit'   ], //id 3
            ['name' => 'delete' , 'label' => 'Deletar'  , 'url' => 'delete' ], //id 4
            ['name' => 'restore', 'label' => 'Restaurar', 'url' => 'restore'], //id 5
        ];
        foreach ($modelData as $data) {
            Method::create($data);
        }
    }

    private function createModules()
    {
        $modelData = [
            ['name' => 'get_user',     'label' => 'Listar usuários',   'url' => 'users', 'method_id' => 1], //id 1
            ['name' => 'create_user',  'label' => 'Criar usuários',    'url' => 'users', 'method_id' => 2], //id 2
            ['name' => 'update_user',  'label' => 'Alterar usuários',  'url' => 'users', 'method_id' => 3], //id 3
            ['name' => 'delete_user',  'label' => 'Deletar usuários',  'url' => 'users', 'method_id' => 4], //id 4
            ['name' => 'restore_user', 'label' => 'Retaurar usuários', 'url' => 'users', 'method_id' => 5], //id 5
        ];
        foreach ($modelData as $data) {
            Module::create($data);
        }
    }

    private function createGroupModule()
    {
        $modelData = [
            ['group_id' => 1, 'module_id' => 1], //Grupo Users Mod   -> user_get    //id 1
            ['group_id' => 1, 'module_id' => 2], //Grupo Users Mod   -> user_create //id 2
            ['group_id' => 1, 'module_id' => 3], //Grupo Users Mod   -> user_update //id 3
            ['group_id' => 2, 'module_id' => 1], //Grupo Users User  -> user_get    //id 4
        ];
        foreach ($modelData as $data) {
            GroupModule::create($data);
        }
    }

}
