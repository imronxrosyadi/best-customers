<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerEvaluation;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'idNumber',
        'dateOfBirth',
        'gender',
        'address'
    ];

    public function customerEvaluation()
    {
        return $this->hasOne(CustomerEvaluation::class);
    }
}
