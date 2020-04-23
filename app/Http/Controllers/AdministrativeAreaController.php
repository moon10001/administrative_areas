<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrativeAreaController extends Controller
{
  public function getProvinces(Request $request) {
    $id = $request->id;
    $keyword = $request->keyword;
    $results = DB::table('provinces')->
    select(['provinces.id', 'provinces.name']);

    if(isset($id)) {
      $results = $results->find($id);
      return response()->json($results);
    }

    if(isset($keyword)) {
      $results = $results->where('name', 'like', '%'.strtolower($keyword).'%');
    }

    $results = $results->get();

    return response()->json($results);
  }

  public function getCities(Request $request) {
    $id = $request->id;
    $provinceId = $request->province_id;
    $keyword = $request->keyword;
    $results = DB::table('cities')->
    select(['cities.id', 'cities.name']);

    if(isset($id)) {
      $results = $results->find($id);
      return response()->json($results);
    }

    if(isset($provinceId)) {
      $results = $results->whereProvincesId($provinceId);
    }

    if(isset($keyword)) {
      $results = $results->where('name', 'like', '%'.strtolower($keyword).'%');
    }

    $results = $results->get();
    return response()->json($results);
  }

  public function getDistricts(Request $request) {
    $id = $request->id;
    $provinceId = $request->province_id;
    $cityId = $request->city_id;
    $keyword = $request->keyword;
    $results = DB::table('districts')->
      select(['districts.id', 'districts.name'])->
      join('cities', 'cities_id', '=', 'cities.id');

    if(isset($id)) {
      $results = $results->find($id);
      return response()->json($results);
    }

    if(isset($cityId)) {
      $results = $results->whereCitiesId($cityId);
    } else if(isset($provinceId)) {
      $results = $results->where('cities.provinces_id', '=', $provinceId);
    }

    if(isset($keyword)) {
      $results = $results->where('districts.name', 'like', '%'.strtolower($keyword).'%');
    }

    $results = $results->get();

    return response()->json($results);

  }

  public function getSubDistricts(Request $request) {
    $id = $request->id;
    $provinceId = $request->province_id;
    $cityId = $request->city_id;
    $districtId = $request->district_id;
    $keyword = $request->keyword;
    $results = DB::table('sub_districts')->
      select(['sub_districts.id', 'sub_districts.name'])->
      join('districts', 'sub_districts.districts_id', '=', 'districts.id')->
      join('cities', 'cities.id', '=', 'districts.cities_id');

    if(isset($id)) {
      $results = $results->find($id);
      return response()->json($results);
    }

    if(isset($districtId)) {
      $results = $results->whereDistrictsId($districtId);
    } else if(isset($cityId)) {
      $results = $results->where('districts.cities_id', '=', $cityId);
    } else if(isset($provinceId)) {
      $results = $results->where('cities.provinces_id', '=', $provinceId);
    }

    if(isset($keyword)) {
      $results = $results->where('sub_districts.name', 'like', '%'.strtolower($keyword).'%');
    }

    $results = $results->get();

    return response()->json($results);
  }

  public function getHierarchy(Request $request) {
    $id = $request->id;
    $results = DB::table('provinces');
  }
}
