<?php

namespace App\Models;

use CodeIgniter\Model;

class Plan extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'plans';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['plan'];

}
