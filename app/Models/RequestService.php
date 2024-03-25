<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RequestService extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'request_services';

    protected $appends = [
        'visiting_form',
        'offer_price_file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_id',
        'user_id',
        'message',
        'place',
        'offer_price',
        'status',
        'edits',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending' => 'قيد الانتظار', 
        'edit'    => 'طلب تعديل',
        'accept'  => 'موافق',
        'refuse'  => 'رفض نهائي',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        self::observe(new \App\Observers\RequestServiceActionObserver);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getVisitingFormAttribute()
    {
        return $this->getMedia('visiting_form')->last();
    }

    public function getOfferPriceFileAttribute()
    {
        return $this->getMedia('offer_price_file')->last();
    }
}
