<?php

namespace App\Filters;

class BookFilter extends QueryFilter
{
    public function language_id($language_id = null){
        return $this->builder->when($language_id, function($query) use($language_id){
            $query->where('language_id', $language_id);
        });
    }

    public function year_from($year_from = null){
        return $this->builder->when($year_from, function($query) use($year_from){
            $query->where('year', '>=', $year_from);
        });
    }

    public function year_to($year_to = null){
        return $this->builder->when($year_to, function($query) use($year_to){
            $query->where('year', '<=', $year_to);
        });
    }

}
