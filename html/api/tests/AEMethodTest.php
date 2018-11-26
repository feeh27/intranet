<?php

namespace Tests;

use App\Domain\Auth\Method\Method as Model;

/**
 * Class AEMethodTest: Responsável pelos testes das rotas
 *
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class AEMethodTest extends BaseTesting
{
    /**
     * ACGroupTest constructor.
     * @since Version 0.2.0
     */
    public function __construct()
    {
        $model = new Model();
        $this->postData     = [
            'name' => 'copy',
            'label' => 'Copiar',
            'url' => 'copy'
        ];
        $this->hiddenData   = [
        ];
        $this->putData   = ['label' => 'Copiar Registro', 'active' => 0];
        $this->patchData = ['active' => 1];
        $this->nextId    = 6;
        $this->errorData = [
            ['name'   => 'Abc_Abc_Abc'],
            ['label'  => 'Abc_Abc_Abc'],
            ['url'    => 'Abc_Abc_Abc'],
            ['active' => 'Abc_Abc_Abc']
        ];

        parent::__construct($model);
    }
}