<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Classe responsável por gerenciar os dados dos perfis de usuários
 *
 * @package     Intranet
 * @subpackage  Api
 * @category    Model
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.1.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class Profile extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function users() {
        return $this->hasMany('App\User');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'active',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}