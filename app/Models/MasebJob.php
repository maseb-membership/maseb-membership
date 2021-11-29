<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasebJob extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the MasebJob
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->hasMany(User::class);
    }
}
