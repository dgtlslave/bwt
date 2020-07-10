<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Company;
use App\User;

class CountryController extends Controller
{
    public function index() {
        return view('layouts.country');
    }

    public function getCountries() {
        return Country::all();
    }

    public function getUsers(Request $request) {
        $users = Company::where(['country_id' => $request->country])->with(['users'])->get();
        return $users;
    }
}
