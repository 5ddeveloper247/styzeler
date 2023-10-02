<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'data',
        'type',
        'address',
        'age',
        'surname',
        'profile_type',
        'qualification',
        'languages',
        'rate',
        'zone',
        'cv',
        'resume',
        'hero_image',
        'gallery',
        'utr_number',
        'post_code',
        'public_liability_insurance',
        'trade_video',
        'status',
        'tokens',
        'total_tokens'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'data' => 'json',
        'qualification' => 'array',
        'zone' => 'array',
        'hero_image' => 'array',
        'gallery' => 'array',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function scopeHasTypes($query, $types)
    {
        return $query->whereJsonContains('data->massageServices', $types)
            ->orWhereJsonContains('data->hairRemovalPermanentServices', $types)
            ->orWhereJsonContains('data->ladyWaxingServices', $types)
            ->orWhereJsonContains('data->maleWaxingServices', $types)
            ->orWhereJsonContains('data->manicurePedicureServices', $types)
            ->orWhereJsonContains('data->salonFacialServices', $types)
            ->orWhereJsonContains('data->homeServiceFacialServices', $types)
            ->orWhereJsonContains('data->bodyTreatmentServices', $types)
            ->orWhereJsonContains('data->EyesAndBrowServices', $types)
            ->orWhereJsonContains('data->bodyTreatmentServices', $types)
            ->orWhereJsonContains('data->bodyTreatmentServices', $types);
    }
}
