<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCriteria;


class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'weight',
        'type',
    ];

    public function subCriteria()
    {
        return $this->hasMany(SubCriteria::class);
    }
}
