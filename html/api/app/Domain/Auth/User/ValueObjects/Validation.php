<?php

namespace App\Domain\Auth\User\ValueObjects;

use App\Infrastructure\Contracts\ValidationInterface;
use App\Infrastructure\BaseValidation;

/**
 * Class UserValidation: responsável pelas regras de validação de usuários
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
            'name'       => 'required|regex:/^['.self::ALPHA_EMPHASIS.']+$/',
            'lastname'   => 'required|regex:/^['.self::ALPHA_EMPHASIS_SPACE.']+$/',
            'email'      => 'required|email|unique:users',
            'login'      => 'required|alpha_num|unique:users',
            'password'   => 'required|alpha_num',
            'profile_id' => 'integer|exists:profiles,id',
            'active'     => ['regex:/^['.self::ONE_OR_ZERO.']$/'],
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
            'name'       => 'sometimes|required|regex:/^['.self::ALPHA_EMPHASIS.']+$/',
            'lastname'   => 'sometimes|required|regex:/^['.self::ALPHA_EMPHASIS_SPACE.']+$/',
            'email'      => 'sometimes|required|email|unique:users',
            'login'      => 'sometimes|required|alpha_num|unique:users',
            'password'   => 'sometimes|required|alpha_num',
            'profile_id' => 'integer|exists:profiles,id',
            'active'     => ['regex:/^['.self::ONE_OR_ZERO.']$/'],
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
            'name.regex'         => __('alpha_emphasis_validation'),
            'lastname.regex'     => __('alpha_emphasis_space_validation'),
            'email.unique'       => __('unique_validation',               ['name' => __('email')]),
            'login.unique'       => __('unique_validation',               ['name' => __('login')]),
            'profile_id.exists'  => __('exists_id_validation',            ['name' => __('profile')]),
            'active.regex'       => __('enabled_disabled_validation'),
        ];
    }
}
