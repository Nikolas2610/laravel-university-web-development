<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;
use App\Http\Requests\MunicipalityRequest;
use App\Http\Resources\MunicipalityResource;

class MunicipalityController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $municipalities = Municipality::all();
        return MunicipalityResource::collection($municipalities);
    }

    public function store(MunicipalityRequest $request): MunicipalityResource
    {
        $municipality = new Municipality();
        $municipality->name = $request->input('name');
        $municipality->save();

        return new MunicipalityResource($municipality);
    }

    public function show($id): MunicipalityResource
    {
        $municipality = Municipality::findOrFail($id);
        return new MunicipalityResource($municipality);
    }

    public function update(MunicipalityRequest $request, $id): MunicipalityResource
    {
        $municipality = Municipality::findOrFail($id);
        $municipality->id = $request->input('id');
        $municipality->name = $request->input('name');
        $municipality->save();

        return new MunicipalityResource($municipality);
    }

    public function destroy($id): \Illuminate\Http\Response
    {
        $municipality = Municipality::findOrFail($id);
        $municipality->delete();

        return response()->noContent();
    }
}
