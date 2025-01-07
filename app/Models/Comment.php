<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'comments ';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['blog_id','name','email','message'];

  
}
