<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPeriod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'period_no',
        'from_date',
        'to_date',
    ];

    protected $appends = [
        'max_period_no',
    ];

    public function getMaxPeriodNoAttribute($value){
        return SubscriptionPeriod::all()->max('period_no');
    }

    /**
     * The members that belong to the BatchUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(Member::class, 'periodic_payments', 'subscription_period_id', 'member_id')
            ->withPivot(['amount', 'reciept_no', 'payment_date', 'method'])
            ->withTimestamps();
    }

    /**
     * Get the batch that owns the SubscriptionPeriod
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
