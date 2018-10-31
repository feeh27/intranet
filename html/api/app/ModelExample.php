<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ModelExample: Model de exemplo
 * @package   App
 * @category  API
 * @author    Felipe Dominguesche <fe.dominguesche@gmail.com>
 * @version   Version 0.1.0
 * @access    public
 * @link      https://www.github.com/feeh27/intranet
 * @since     Version 0.1.0
 */
class ModelExample extends Model
{
    use SoftDeletes;

    /**
     * URI route
     * @var array
     */
    public $uri = "examplemodels";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}