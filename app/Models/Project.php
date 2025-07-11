<?php

namespace App\Models;

use App\Traits\HasSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    use HasSort;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'links' => 'array',
        ];
    }
}
