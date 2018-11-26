<?php

namespace Tests;

use App\Domain\Auth\GroupProfile\GroupProfile as Model;

/**
 * Class ADGroupProfileTest: Responsável pelos testes das rotas
 *
 * @package     Tests
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class ADGroupProfileTest extends BaseTesting
{
    /**
     * ACGroupTest constructor.
     * @since Version 0.2.0
     */
    public function __construct()
    {
        $model = new Model();
        $this->postData      = [
            'group_id' => 3, 'profile_id' => 5
        ];
        $this->hiddenData   = [
        ];
        $this->putData   = ['group_id' => 2, 'profile_id' => 5];
        $this->patchData = ['group_id' => 3];
        $this->nextId    = 3;
        $this->errorData = [
            ['group_id'   => 'Abc_Abc_Abc'],
            ['profile_id' => 'Abc_Abc_Abc'],
        ];

        parent::__construct($model);
    }
}