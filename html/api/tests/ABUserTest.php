<?php

namespace Tests;

use App\Domain\Auth\User\User as Model;

/**
 * Class ABUserTest: Responsável pelos testes das rotas
 *
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class ABUserTest extends BaseTesting
{
    /**
     * AAUserTest constructor.
     * @since Version 0.1.0
     */
    public function __construct()
    {
        $model = new Model();
        $this->postData      = [
            'name'     => 'Stevis',
            'lastname' => 'Jobs',
            'email'    => 'stevis@ioteducation.com.br',
            'login'    => 'stevis',
        ];
        $this->hiddenData   = [
            'password' => '123456',
        ];
        $this->putData   = ['profile_id' => 3, 'active' => 0];
        $this->patchData = ['active' => 1];
        $this->nextId    = 5;
        $this->errorData = [
            ['name'       => 'Abc_Abc_Abc'],
            ['lastname'   => 'Abc_Abc_Abc'],
            ['email'      => 'Abc_Abc_Abc'],
            ['login'      => 'Abc_Abc_Abc'],
            ['password'   => 'Abc_Abc_Abc'],
            ['profile_id' => 'Abc_Abc_Abc'],
            ['active'     => 'Abc_Abc_Abc']
        ];

        parent::__construct($model);
    }
}