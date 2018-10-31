<?php

namespace Tests;

use App\User as Model;

/**
 * Class AAUserTest: Responsável pelos testes das rotas de usuários
 *
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.1.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class AAUserTest extends BaseTesting
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
        $this->putData       = ['profile_id' => 3, 'active' => 0];
        $this->patchData     = ['active' => 1];
        $this->nextId = 5;

        parent::__construct($model);
    }
}