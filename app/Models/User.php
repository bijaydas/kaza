<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, ModelHelper, Notifiable, SoftDeletes;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'type',
        'date_of_birth',
        'anniversary_date',
        'gender',
        'phone',
        'password',
        'avatar',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'date_of_birth' => 'date',
            'anniversary_date' => 'date',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function fullName(): string
    {
        return trim($this->first_name) . ' ' . trim($this->last_name);
    }

    public function expense(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
