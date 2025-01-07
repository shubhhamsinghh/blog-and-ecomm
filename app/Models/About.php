<?php

namespace App\Models;

use CodeIgniter\Model;

class About extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'abouts';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['about_us','thumbnail'];
   
}
