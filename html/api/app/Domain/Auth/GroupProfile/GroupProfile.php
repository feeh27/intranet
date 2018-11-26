<?php

namespace App\Domain\Auth\GroupProfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GroupProfile: Responsável por gerenciar o modelo da relação entre grupos e perfis
 *
 * @package     App\Domain\Auth\GroupProfile
 * @category    Api
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.1.0
 */
class GroupProfile extends Model
{
    use SoftDeletes;

    /**
     * URI route
     * @since Version 0.2.0
     * @var array
     */
    public $table = 'group_profile';

    /**
     * URI route
     * @since Version 0.1.0
     * @var array
     */
    public $uri = 'groupprofile';

    /**
     * The attributes that are mass assignable.
     * @since Version 0.2.0
     * @var array
     */
    protected $fillable = [
        'profile_id', 'group_id',
    ];

    /**
     * @since Version 0.2.0
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function profiles()
    {
        return $this->belongsToMany(\App\Domain\Auth\Profile\Profile::class);
    }

    /**
     * @since Version 0.2.0
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(\App\Domain\Auth\Group\Group::class);
    }
}