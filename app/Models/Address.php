<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country',
        'city',
        'zone_sub_city',
        'kebele',
        'woreda',
        'house_no',
        'phone_mobile',
        'phone_mobile_2',
        'phone_fixed_line',
    ];

    /**
     * Get the user that owns the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
