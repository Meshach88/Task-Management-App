<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'due_date'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for filtering pending tasks
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Scope for filtering completed tasks
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
