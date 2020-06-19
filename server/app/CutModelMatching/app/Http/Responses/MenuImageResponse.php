<?php

namespace App\Http\Response;

use App\MenuImage;

class MenuImageResponse extends Response {

    public $id;
    public $path;
    public $menuId;
    public $createdAt;
    public $updatedAt;

    public function constructWith(MenuImage $menuImage) {
        $this->id = $menuImage->id;
        $this->path = $menuImage->path;
        $this->menuId = $menuImage->menuId;
        $this->createdAt = $menuImage->createdAt;
        $this->updatedAt = $menuImage->updatedAt;
    }

}
