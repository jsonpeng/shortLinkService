<?php

namespace App\Repositories;

use App\Models\LinkList;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LinkListRepository
 * @package App\Repositories
 * @version November 26, 2018, 2:54 pm CST
 *
 * @method LinkList findWithoutFail($id, $columns = ['*'])
 * @method LinkList find($id, $columns = ['*'])
 * @method LinkList first($columns = ['*'])
*/
class LinkListRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'word',
        'link',
        'view'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LinkList::class;
    }
}
