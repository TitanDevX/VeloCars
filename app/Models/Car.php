<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Car extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->useFallbackPath(public_path('images/default-car-thumbnail.png'))
            ->singleFile();
        $this
            ->addMediaCollection('photos')
            ->useFallbackPath(public_path('/images/default-car-photos/img-2-960x.avif'))
            ->useFallbackPath(public_path('/images/default-car-photos/img-5-960x.avif'))
            ->useFallbackPath(public_path('/images/default-car-photos/img-7-960x.avif'))
            ->useFallbackPath(public_path('/images/default-car-photos/img-11-960x.avif'));
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function details()
    {
        return $this->hasOne(CarDetail::class);
    }
    public function soldTo()
    {
        return $this->belongsTo(User::class, 'sold_to_user_id');
    }

    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'payable');
    }
}
