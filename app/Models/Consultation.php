<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'anonymous',
    ];

    protected $casts = [
        'anonymous' => 'boolean',
    ];

    /**
     * Get the user who created this consultation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the replies for the consultation.
     */
    public function replies()
    {
        return $this->hasMany(ConsultationReply::class);
    }
}
