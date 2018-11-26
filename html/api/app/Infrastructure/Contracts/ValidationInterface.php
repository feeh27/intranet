<?php

namespace App\Infrastructure\Contracts;

/**
 * Class GroupModuleValidation: responsável pelas regras de validação da relação entre grupo e módulos
 *
 * @package     App\Infrastructure
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
interface ValidationInterface
{
    /**
     * Retorna as regras de criação do modelo
     * @since  Version 0.2.0
     * @return array
     */
    public static function getRulesCreate(): array;

    /**
     * Retorna as regras de alteração do modelo
     * @since  Version 0.2.0
     * @return array
     */
    public static function getRulesUpdate(): array;

    /**
     * Retorna as mensagens de erro na validação
     * @since  Version 0.2.0
     * @return array
     */
    public static function getMessages(): array;
}