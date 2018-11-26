<?php

namespace App\Domain\Auth\User;

use App\Domain\Auth\Module\Module;
use App\Domain\Auth\Profile\Profile;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User: Responsável por gerenciar o modelo de usuários
 *
 * @package     App\Domain\Auth\User
 * @category    Api
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, SoftDeletes;

    /**
     * URI route
     * @since Version 0.1.0
     * @var array
     */
    public $uri = 'users';

    /**
     * The attributes that are mass assignable.
     * @since Version 0.1.0
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'login', 'password', 'profile_id', 'active',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @since Version 0.1.0
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    //=========== Permissões ===========
    /**
     * Relação 1 para 1
     * @since  Version 0.2.0
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function profile() {
        return $this->belongsTo('App\Domain\Auth\Profile\Profile');
    }

    /**
     * Verifica se o usuário possui a permissão solicitada
     * @since  Version 0.2.0
     * @param  Module $module
     * @return bool
     */
    public function hasPermission(Module $module): bool
    {
        return !! ($this->profile->name == $this->profile->admin_profile_name) || $this->hasAnyGroup($module->groups);
    }

    /**
     * Verifica quais são os grupos que o usuário tem acesso
     * @since  Version 0.2.0
     * @param  $groups
     * @return bool
     */
    public function hasAnyGroup($groups): bool
    {
        if (is_array($groups) || is_object($groups)) {
            return !! $groups->intersect($this->profile->groups)->count();
        }

        return false;
    }

    /**
     * Verifica se o usuário possui o perfil enviado
     * @since  Version 0.2.0
     * @param  $profile
     * @return bool
     */
    public function hasProfile(Profile $profile): bool
    {
        return $this->profile == $profile;
    }

    /**
     * @param
     */
    //=========== Permissões ===========

    //============== JWT ==============
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     * @since  Version 0.2.0
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     * @since  Version 0.2.0
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    //============== JWT ==============
}
