<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class CustomerEvaluation extends Model
{
    use HasFactory;

    protected $table='customers_evaluations';

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customerPointEvaluation()
    {
        return $this->hasMany(CustomerPointEvaluation::class);
    }
}
