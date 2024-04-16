<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['brandName', 'ownerName', 'numberOfCrates', 'company_idd', 'company_id', 'is_delete', 'created_at', 'updated_at'];

}
