<?php

namespace App\Http\Responses;

use App\MenuTagCategory;

class MenuTagCategoryResponse extends Response
{

    //     +------------+----------------------+------+-----+---------+----------------+
    // | Field      | Type                 | Null | Key | Default | Extra          |
    // +------------+----------------------+------+-----+---------+----------------+
    // | id         | int(10) unsigned     | NO   | PRI | NULL    | auto_increment |
    // | name       | varchar(16)          | NO   | UNI | NULL    |                |
    // | index      | smallint(5) unsigned | NO   | UNI | NULL    |                |
    // | created_at | timestamp            | YES  |     | NULL    |                |
    // | updated_at | timestamp            | YES  |     | NULL    |                |
    // +------------+----------------------+------+-----+---------+----------------+

    public $id;
    public $name;
    public $index;
    public $createdAt;
    public $updatedAt;

    public $tags;

    public function constructWith(MenuTagCategory $menuTagCategory)
    {
        $this->id = $menuTagCategory->id;
        $this->name = $menuTagCategory->name;
        $this->index = $menuTagCategory->index;
        $this->createdAt = $menuTagCategory->created_at->toDateTimeString();
        $this->updatedAt = $menuTagCategory->updated_at->toDateTimeString();
    }
}
