<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reporter_name',
        'reporter_age',
        'reporter_role',
        'description',
        'bullying_type',
        'status',
        'location',
        'incident_time',
        'anonymous',
    ];

    protected $casts = [
        'anonymous' => 'boolean',
        'incident_time' => 'datetime',
    ];

    /**
     * Get the user who created this report
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get evidences for this report
     */
    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }

    /**
     * Get messages for this report
     */
    public function messages()
    {
        return $this->hasMany(ReportMessage::class);
    }

    /**
     * Scope for pending reports
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for resolved reports
     */
    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }
}
