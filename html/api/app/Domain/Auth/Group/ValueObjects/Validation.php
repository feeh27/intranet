<?php

namespace App\Domain\Auth\Group\ValueObjects;

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
            'name'   => 'required|regex:/^['.self::ALPHA_LOWER_UNDERLINE.']+$/',
            'label'  => 'required|regex:/^['.self::ALPHA_EMPHASIS_SPACE.']+$/',
            'active' => ['regex:/^['.self::ONE_OR_ZERO.']$/'],
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
            'name'   => 'sometimes|required|regex:/^['.self::ALPHA_LOWER_UNDERLINE.']+$/',
            'label'  => 'sometimes|required|regex:/^['.self::ALPHA_EMPHASIS_SPACE.']+$/',
            'active' => ['regex:/^['.self::ONE_OR_ZERO.']$/'],
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
            'name.regex'   => __('alpha_lower_underline_validation'),
            'label.regex'  => __('alpha_emphasis_space_validation'),
            'active.regex' => __('enabled_disabled_validation'),
        ];
    }
}