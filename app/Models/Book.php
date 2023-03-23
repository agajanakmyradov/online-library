<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'image',
        'language_id',
        'year',
        'description',
        'user_id',
        'category_id',
        'author',
        'format',
        'size'
    ];

    public function language( )
    {
        return $this->belongsTo(Language::class);
    }

    public function category(Type $var = null)
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
