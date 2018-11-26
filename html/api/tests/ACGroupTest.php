<?php

namespace Tests;

use App\Domain\Auth\Group\Group as Model;

/**
 * Class ACGroupTest: Responsável pelos testes das rotas
 *
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ACGroupTest extends BaseTesting
{
    /**
     * ACGroupTest constructor.
     * @since Version 0.2.0
     */
    public function __construct()
    {
        $model = new Model();
        $this->postData      = [
            'name'  => 'editor_users',
            'label' => 'Edita no módulo de usuários',
        ];
        $this->hiddenData   = [
        ];
        $this->putData   = ['label' => 'Permissão de editor no módulo de usuários', 'active' => 0];
        $this->patchData = ['active' => 1];
        $this->nextId    = 3;
        $this->errorData = [
            ['name'   => 'Abc_Abc_Abc'],
            ['label'  => 'Abc_Abc_Abc'],
            ['active' => 'Abc_Abc_Abc'],
        ];

        parent::__construct($model);
    }
}