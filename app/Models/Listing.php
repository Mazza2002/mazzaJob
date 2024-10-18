<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    public $table = "listing";
    // public $fillable=['title','tags','company','email','location','website','description'];
    public function scopeFilter($query, array $fillters)
    {
        if ($fillters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if ($fillters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
    public function user(){
        $this->belongsTo(User::class,'user_id');
    }
}
