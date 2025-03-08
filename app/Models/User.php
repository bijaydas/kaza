<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use ModelHelper;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
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
        $name = trim($this->first_name).' '.trim($this->last_name);
        $fullName = trim($name);

        if ($fullName) {
            return $fullName;
        }

        return $this->email;
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function isAdmin(): bool
    {
        $role = $this->roles()->first()->name;

        return $role === UserRole::ADMIN->value;
    }

    public function loginSessions(): HasMany
    {
        return $this->hasMany(LoginSession::class);
    }

    public function getGender(): string
    {
        return $this->gender ?? 'Not Set';
    }

    public function getPhone(): string
    {
        $phone = trim($this->phone);

        if ($phone) {
            return $phone;
        }

        return 'Not Set';
    }

    public function getDateOfBirth(): string
    {
        if ($this->date_of_birth) {
            return $this->date_of_birth->format('d M Y');
        }

        return 'Not Set';
    }

    public function getDateOfAnniversary(): string
    {
        if ($this->anniversary_date) {
            return $this->anniversary_date->format('d M Y');
        }

        return 'Not Set';
    }

    public function getCreatedOn()
    {
        return $this->created_at->diffForHumans();
    }
}
