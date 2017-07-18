<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
  public function showForm()
  {
      $countries = Country::all();

      return view('form', compact('countries'));
  }
}
