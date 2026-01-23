<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action', // e.g., 'user_banned', 'warning_sent'
        'details', // JSON or text description
        'ip_address',
        'performer_id', // ID of the admin who performed the action (optional if needed)
    ];

    protected $casts = [
        'details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function performer()
    {
        return $this->belongsTo(User::class, 'performer_id');
    }

    /**
     * Helper to log activities
     */
    public static function log($action, $details = null, $userId = null)
    {
        return self::create([
            'user_id' => $userId,
            'performer_id' => \Auth::id(),
            'action' => $action,
            'details' => $details,
            'ip_address' => request()->ip(),
        ]);
    }
}
