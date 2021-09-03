<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'membership_status',
        'registered_at',
        'registered_by',
        'approved_at',
        'approved_by',
    ];





    /**
     * The membership_types that belong to the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function membership_types()
    {
        return $this->belongsToMany(MembershipType::class, 'member_membership_type', 'member_id', 'membership_type_id')
            ->withPivot(
                'created_at',
                'created_by',
                'approved_at',
                'approved_by',
            );
            // ->withTimestamps();
    }

    /**
     * The membership_types that belong to the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function membership_levels()
    {
        return $this->belongsToMany(MembershipLevel::class, 'member_membership_level', 'member_id', 'membership_level_id')
            ->withPivot(
                'created_at',
                'created_by',
                'approved_at',
                'approved_by',
            );
            // ->withTimestamps();
    }
}
