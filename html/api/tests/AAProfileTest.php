<?php

namespace Tests;

use App\Domain\Auth\Profile\Profile as Model;

/**
 * Class AAProfileTest: Responsável pelos testes das rotas
 *
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class AAProfileTest extends BaseTesting
{
    /**
     * AAProfileTest constructor.
     * @since Version 0.2.0
     */
    public function __construct()
    {
        $this->model = new Model();
        $this->postData      = [
            'name'  => 'Editor',
            'label' => 'Edita as coisas',
        ];
        $this->hiddenData   = [
        ];
        $this->putData   = ['label' => 'Edita os registros', 'active' => 0];
        $this->patchData = ['active' => 1];
        $this->nextId    = 5;
        $this->errorData = [
            ['name'   => 'Abc_Abc_Abc'],
            ['label'  => 'Abc_Abc_Abc'],
            ['active' => 'Abc_Abc_Abc']
        ];

        parent::__construct($this->model);
    }
}
