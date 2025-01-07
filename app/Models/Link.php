<?php

namespace App\Models;

use CodeIgniter\Model;

class Link extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'links';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['facebook','twitter','google','instagram','youtube'];
}
