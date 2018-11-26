<?php

namespace Tests;

use App\Domain\Auth\Module\Module as Model;

/**
 * Class AFModuleTest: Responsável pelos testes das rotas
 *
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class AFModuleTest extends BaseTesting
{
    /**
     * ACGroupTest constructor.
     * @since Version 0.2.0
     */
    public function __construct()
    {
        $model = new Model();
        $this->postData     = [
            'name' => 'copy_user',
            'label' => 'Copiar registro',
            'url' => 'users',
            'method_id' => 5
        ];
        $this->hiddenData   = [
        ];
        $this->putData   = ['label' => 'Copiar usuário', 'active' => 0];
        $this->patchData = ['active' => 1];
        $this->nextId    = 6;
        $this->errorData = [
            ['name'      => 'Abc_Abc_Abc'],
            ['label'     => 'Abc_Abc_Abc'],
            ['url'       => 'Abc_Abc_Abc'],
            ['method_id' => 'Abc_Abc_Abc'],
            ['active'    => 'Abc_Abc_Abc']
        ];

        parent::__construct($model);
    }
}