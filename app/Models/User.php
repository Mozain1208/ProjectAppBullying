<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'nis',
        'email',
        'password',
        'role',
        'age',
        'status', // Keeping for backward compatibility or simple checks
        'account_status', // active, warning, temp_blocked, perm_blocked
        'warning_count',
        'banned_until',
        'restricted_features',
        'risk_level',
        'admin_notes',
        'last_block_reason',
        'trust_score',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'trust_score' => 'integer',
            'banned_until' => 'datetime',
            'restricted_features' => 'array',
        ];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is banned (either permanently or temporarily active)
     */
    public function isBanned(): bool
    {
        if ($this->account_status === 'perm_blocked') {
            return true;
        }

        if ($this->account_status === 'temp_blocked' && $this->banned_until && $this->banned_until->isFuture()) {
            return true;
        }

        return $this->status === 'banned'; // Fallback
    }

    public function hasActiveWarning(): bool
    {
        return $this->account_status === 'warning';
    }

    /**
     * Get reports created by this user
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Get consultations created by this user
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
    /**
     * Get report handlings performed by this user (admin)
     */
    public function reportHandlings()
    {
        return $this->hasMany(ReportHandling::class, 'admin_id');
    }
}
