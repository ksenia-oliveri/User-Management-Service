<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $id
 * @property string $name
 * @property string $email
 * 
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 */
class User extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'users';
    protected $guarded = false;
    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['created_at', 'updated_at'];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
