<?php

namespace App\Search;

use App\Release;
use Illuminate\Database\Eloquent\Collection;

class EloquentRepository implements ReleasesRepository
{
    public function search(string $query = ''): Collection
    {
        return Release::query()
            ->where('description', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->get();
    }
}