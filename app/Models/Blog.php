<?php

namespace App\Models;

use CodeIgniter\Model;

class Blog extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'blogs';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['category_id','user_id','thumbnail','title','description'];
}
