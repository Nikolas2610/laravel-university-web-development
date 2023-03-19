<?php

namespace App\Models;

use App\Http\Resources\FuelResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;

    public static function getAllFuels(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $fuels = self::all();
        return FuelResource::collection($fuels);
    }

    public static function getAllFuelsArray(): array
    {
        return [
            'Αμόλυμβης Βεζίνης',
            'Πετρελαίου κίνησης',
            'Πετρελαίου Θέρμανσης'
        ];
    }
}
