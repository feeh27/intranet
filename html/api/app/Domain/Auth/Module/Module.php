<?php

namespace App\Domain\Auth\Module;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Module: Responsável pelo modelo de Módulos
 *
 * @package App\Domain\Auth\Module
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class Module extends Model
{
    use SoftDeletes;

    /**
     * URI route
     * @var array
     * @since Version 0.2.0
     */
    public $uri = 'modules';

    /**
     * The attributes that are mass assignable.
     * @var array
     * @since Version 0.2.0
     */
    protected $fillable = [
        'name', 'label', 'url', 'active', 'method_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     * @since Version 0.2.0
     */
    protected $hidden = [
    ];

    /**
     * Relação 1 para 1
     * @since  Version 0.2.0
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function profile() {
        return $this->belongsTo('App\Domain\Auth\Method\Method');
    }

    /**
     * Relação 1 para muitos
     * @since  Version 0.2.0
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function groups() {
        return $this->belongsToMany('App\Domain\Auth\Group\Group');
    }
}