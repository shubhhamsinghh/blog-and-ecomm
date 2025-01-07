<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'categories';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['name'];

  
}
