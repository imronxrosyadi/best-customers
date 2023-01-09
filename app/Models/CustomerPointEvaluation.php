<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerEvaluation;
use App\Models\Criteria;
use App\Models\SubCriteria;



class CustomerPointEvaluation extends Model
{
    use HasFactory;

    public function customerEvaluation()
    {
        return $this->belongsTo(CustomerEvaluation::class);
    }

    // public function criteria()
    // {
    //     return $this->belongsTo(Criteria::class);
    // }

    public function subCriteria()
    {
        return $this->belongsTo(SubCriteria::class);
    }
}
