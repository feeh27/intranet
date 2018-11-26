<?php

namespace App\Domain\Auth\Group;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Group: Responsável pelo modelo de Grupos
 *
 * @package App\Domain\Auth\Group
 * @category    API
 * @author      Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version     Version 0.2.0
 * @access      public
 * @link        https://www.github.com/feeh27/intranet
 * @since       Version 0.2.0
 */
class Group extends Model
{
    use SoftDeletes;

    /**
     * URI route
     * @since Version 0.2.0
     * @var array
     */
    public $uri = 'groups';

    /**
     * The attributes that are mass assignable.
     * @since Version 0.2.0
     * @var array
     */
    protected $fillable = [
        'name', 'label', 'active'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @since Version 0.2.0
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Retorna uma collection
     * @since Version 0.2.0
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(\App\Domain\Auth\Module\Module::class);
    }
}