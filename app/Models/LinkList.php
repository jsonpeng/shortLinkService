<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LinkList
 * @package App\Models
 * @version November 26, 2018, 2:54 pm CST
 *
 * @property string word
 * @property string link
 * @property integer view
 */
class LinkList extends Model
{
    use SoftDeletes;

    public $table = 'link_lists';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'word',
        'link',
        'view'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'word' => 'string',
        'link' => 'string',
        'view' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
