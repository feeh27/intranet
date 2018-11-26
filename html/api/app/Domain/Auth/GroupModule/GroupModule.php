<?php

namespace App\Domain\Auth\GroupModule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GroupModule: Responsável pelo modelo de relação de Grupos e Módulos
 *
 * @package App\Domain\Auth\GroupModule
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class GroupModule extends Model
{
    use SoftDeletes;

    /**
     * @since Version 0.2.0
     * @var string
     */
    protected $table = 'group_module';

    /**
     * URI route
     * @since Version 0.2.0
     * @var array
     */
    public $uri = 'groupmodule';

    /**
     * The attributes that are mass assignable.
     * @since Version 0.2.0
     * @var array
     */
    protected $fillable = [
        'module_id', 'group_id',
    ];

    /**
     * @since Version 0.2.0
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(\App\Domain\Auth\Module\Module::class);
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