<?php

namespace App\Models;

use CodeIgniter\Model;

class Service extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'services';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['title','description','thumbnail'];
}
