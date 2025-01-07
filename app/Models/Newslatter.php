<?php

namespace App\Models;

use CodeIgniter\Model;

class Newslatter extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'newslatter';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['email'];
}
