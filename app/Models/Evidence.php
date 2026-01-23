<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    protected $table = 'evidences';

    protected $fillable = [
        'report_id',
        'file_path',
        'file_type',
        'file_size',
    ];

    /**
     * Get the report this evidence belongs to
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
