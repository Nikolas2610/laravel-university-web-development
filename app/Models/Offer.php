<?php

namespace App\Models;

use App\Http\Resources\OfferResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fuel_id',
        'municipality_id',
        'county_id',
        'expire_date',
        'amount',
        'afm',
        'name',
        'address'];

    protected $casts = [
        'afm' => 'integer',
        'municipality_id' => 'integer',
        'county_id' => 'integer',
        'fuel_id' => 'integer',
        'amount' => 'integer',
    ];

    public static function getAllOffers(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $offers = self::all();
        return OfferResource::collection($offers);
    }

    public function fuel(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Fuel::class);
    }

}
