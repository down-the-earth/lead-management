<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'budget',
        'source',
        'status',
        'assigned_to',
        'created_by',
        'message'
    ];
    public function assignedUser()
    {
        return $this->belongsTo(User::class,'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }

    public function activities()
    {
        return $this->hasMany(LeadActivity::class);
    }
}
