<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
  public function showCitiesInCountry(Request $request)
  {
      if ($request->ajax()) {
          $cities = City::whereCountryId($request->country_id)->select('id', 'name')->get();

          return response()->json($cities);
      }
  }
}
