<?php

namespace App\Models;

use CodeIgniter\Model;

class SEOService extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'seo_services';
    protected $primaryKey           = 'id';
    protected $allowedFields        = ['title','description','thumbnail'];

}
