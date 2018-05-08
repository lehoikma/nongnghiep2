<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use SoftDeletes;

    protected $table = 'documents';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'no_key', 'date', 'attach'
    ];
}