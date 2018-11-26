<?php

namespace App\Domain\Auth\Method;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Method: Responsável pelo modelo de Métodos
 *
 * @package App\Domain\Auth\Method
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class Method extends Model
{
    use SoftDeletes;

    /**
     * URI route
     * @var array
     * @since Version 0.2.0
     */
    public $uri = 'methods';

    /**
     * The attributes that are mass assignable.
     * @var array
     * @since Version 0.2.0
     */
    protected $fillable = [
        'name', 'label', 'url', 'active'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     * @since Version 0.2.0
     */
    protected $hidden = [
    ];
}