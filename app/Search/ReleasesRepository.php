<?php

namespace App\Search;

use Illuminate\Database\Eloquent\Collection;

interface ReleasesRepository
{
    public function search(string $query = ''): Collection;
}
