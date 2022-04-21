<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['judul', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['kategori', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function($query, $cari) {
            return $query->where('judul', 'like', '%' . $cari . '%')
                        ->orWhere('body', 'like', '%' . $cari . '%');
        });

        $query->when($filters['kategori'] ?? false, function($query, $kategori) {
            return$query->whereHas('kategori', function($query) use ($kategori) {
                $query->where('slug', $kategori);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
