<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use DateTime;

class Post extends DataLayer
{
    public function __construct()
    {
        parent::__construct("posts", ["id_user", "post_text", "publish_day"], "id_post", false);
    }

    public function getUser()
    {
        $id = $this->id_user;
        $user = (new User())->findById($id);

        return $user;
    }
}