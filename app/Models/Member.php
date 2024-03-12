<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Member extends Model
{
    use HasFactory;

    protected $table ='members';
    protected $fillable = [

        'last_name',
        'first_name',
        'middle_name',
        't_birth',
        'email',
        'aka',
        'gt',
        'phone',
        'batch_name',
        'current_chapter',
        'root_chapter',
        'status',
        'photo',
        'user_id',
        'user_type',
        'region',
        'province',
        'municipality',
        'barangay',
        'address',
    ];

    protected static function boot()
    {
        parent::boot();

        // CREATING A UNIQUE MEMBER ID
        static::creating(function ($member) {
            $lastName = strtoupper(substr($member->last_name, 0, 1));
            $firstName = strtoupper(substr($member->first_name, 0, 1));
            $middleName = strtoupper(substr($member->middle_name, 0, 1));
            $birthday = Carbon::parse($member->t_birth)->format('Ymd');
            $randomNumber = rand(100000, 999999); // Generate a random 6-digit number
            $member->member_id = $lastName . $firstName . $middleName . $birthday . $randomNumber;

          
        });


        static::saving(function ($model) {
            $model->last_name = Str::upper($model->last_name);
            $model->first_name = Str::upper($model->first_name);
            $model->middle_name = Str::upper($model->middle_name);
            $model->aka = Str::upper($model->aka);
            $model->gt = Str::upper($model->gt);
            $model->batch_name = Str::upper($model->batch_name);
            $model->current_chapter = Str::upper($model->current_chapter);
            $model->root_chapter = Str::upper($model->root_chapter);
            $model->status = Str::upper($model->status);
            $model->user_type = Str::upper($model->user_type);
            $model->region = Str::upper($model->region);
            $model->province = Str::upper($model->province);
            $model->municipality = Str::upper($model->municipality);
            $model->barangay = Str::upper($model->barangay);
            $model->address = Str::upper($model->address);
        });
    }


    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
