<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipLevel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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

                'published_at',
                'published_by',
                'approved_at',
                'approved_by',
            ])
            ->withTimestamps();
    }

}
