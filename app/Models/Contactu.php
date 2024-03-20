<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactu extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'contactus';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SUBJECT_SELECT = [
        'inquiry'     => 'استفسار',
        'appointment' => 'تحديد موعد',
        'complaints'  => 'شكاوي ومقترحات',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        self::observe(new \App\Observers\ContactuActionObserver);
    }
}
