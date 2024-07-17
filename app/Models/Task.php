<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status_id',
        'due_date'
    ];

    public function scopeFilter($query, array $filters)
    {
        return $query->when($filters['status_id'] ?? null, function ($query, $status_id) {
            $query->where('status_id', $status_id);
        })
            ->when($filters['due_date'] ?? null, function ($query, $due_date) {
                $query->where('due_date', $due_date);
            })
            ->when($filters['sort_by'] ?? 'created_at', function ($query, $sort_by) use ($filters) {
                $sort_order = $filters['sort_order'] ?? 'desc';
                $query->orderBy($sort_by, $sort_order);
            });
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
