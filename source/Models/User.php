<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct(){
        parent::__construct("users", ["id_category","name", "email", "password"], "id_user", false);
    }

    public function getCategory(){
        $category = (new Category())->findById($this->id_category, "category");
        $category_name = $category->category;
        
        return $category_name;
    }
}