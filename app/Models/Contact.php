<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'contact_us';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['first_name','last_name','email','subject','message'];
}
