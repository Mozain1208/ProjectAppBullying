<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportHandling extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'admin_id',
        'status',
        'note',
    ];

    /**
     * Get the report associated with the handling.
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * Get the admin who handled the report.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
