<?php

namespace App\Domain\Auth\Profile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GroupProfile: Responsável por gerenciar o modelo de perfis
 *
 * @package     App\Domain\Auth\Profile
 * @category    Api
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class Profile extends Model
{
    use SoftDeletes;

    /**
     * Nome do perfil de administrador
     * @var string
     */
    public $admin_profile_name = 'admin';

    /**
     * URI route
     * @var array
     * @since Version 0.2.0
     */
    public $uri = 'profiles';

    /**
     * The attributes that are mass assignable.
     * @var array
     * @since Version 0.2.0
     */
    protected $fillable = [
        'name', 'label',
    ];

    public function groups()
    {
        return $this->belongsToMany(\App\Domain\Auth\Group\Group::class);
    }
}