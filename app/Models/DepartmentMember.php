<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;
class DepartmentMember extends Pivot
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
        'member_id',
        'department_id',
        'published_at',
        'published_by',
        'approved_at',
        'approved_by',
    ];



}
