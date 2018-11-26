<?php

namespace App\Domain\Auth\GroupModule\ValueObjects;

use App\Infrastructure\Contracts\ValidationInterface;
use App\Infrastructure\BaseValidation;

/**
 * Class Validation: responsável pelas regras de validação
 *
 * @package     App\Domain\Auth\ValueObjects\GroupModule
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class Validation extends BaseValidation implements ValidationInterface
{
    /**
     * Retorna as regras de criação do modelo
     * @since  Version 0.2.0
     * @return array
     */
    public static function getRulesCreate(): array
    {
        return [
            'group_id'  => 'required|integer|exists:groups,id',
            'module_id' => 'required|integer|exists:modules,id',
        ];
    }

    /**
     * Retorna as regras de alteração do modelo
     * @since  Version 0.2.0
     * @return array
     */
    public static function getRulesUpdate(): array
    {
        return [
            'group_id'  => 'sometimes|required|integer|exists:groups,id',
            'module_id' => 'sometimes|required|integer|exists:modules,id',
        ];
    }

    /**
     * Retorna as mensagens de erro na validação
     * @since  Version 0.2.0
     * @return array
     */
    public static function getMessages(): array
    {
        return [
            'group_id.exists'  => __('exists_id_validation', ['name' => __('group')]),
            'module_id.exists' => __('exists_id_validation', ['name' => __('module')]),
        ];
    }
}