<?php

namespace App\Infrastructure\Regex;

/**
 * Class Regex: Armazena as regex
 * @package     App\Infrastructure\Regex
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class Regex
{
    /**
     * @since Version 0.2.0
     * @var String
     */
    const ALPHA_EMPHASIS        = 'A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ';

    /**
     * @since Version 0.2.0
     * @var String
     */
    const ALPHA_EMPHASIS_SPACE  = 'A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ';

    /**
     * @since Version 0.2.0
     * @var String
     */
    const ALPHA_LOWER_DASH      = 'a-z\-';

    /**
     * @since Version 0.2.0
     * @var String
     */
    const ALPHA_LOWER_DASHES    = 'a-z\-_';

    /**
     * @since Version 0.2.0
     * @var String
     */
    const ALPHA_LOWER_UNDERLINE = 'a-z_';

    /**
     * @since Version 0.2.0
     * @var String
     */
    const ONE_OR_ZERO           = '0|1';
}