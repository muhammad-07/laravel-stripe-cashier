<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'stripe_payment_id',
        'file_path',
        'original_name',
        'title',
        'description',
        'state'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    // protected $model;
    // public function SingingDetails(){
    //     return Singing::where('plan_id', $model->plan_id)->where('user_id', $model->user_id)->first();
    // }

    public function auditionDetails() //: BelongsTo
    {
        return Singing::where('plan_id', $this->plan_id)->where('user_id', $this->user_id)->first();
        // return $this->belongsTo(Singing::class, 'user_id', 'user_id')->where('plan_id', $this->plan_id);
    }
}

