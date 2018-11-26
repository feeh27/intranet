<?php

namespace App\Infrastructure\Msg;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Msg: responsável por retornar um objeto com o atributo mensagem
 * @package     App\Infrastructure\Msg
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class Msg extends Model
{

    /**
     * Msg constructor.
     * @since Version 0.2.0
     * @param string $msg
     */
    public function __construct(string $msg)
    {
        $this->setAttribute('message', $msg);
    }

}