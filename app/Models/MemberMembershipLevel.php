<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMembershipLevel extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_at',
        'created_by',
        'approved_at',
        'approved_by',
        'membership_level_id',
        'member_id',
    ];

    /**
     * The members that belong to the MemberMembershipLevel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(Memeber::class, 'member_membership_level', 'membership_level_id', 'member_id')
            ->withPivot([

                'created_at',
                'created_by',
                'approved_at',
                'approved_by',
            ]);
            // ->withTimestamps();
    }

}
