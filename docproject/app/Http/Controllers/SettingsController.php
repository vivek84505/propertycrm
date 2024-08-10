<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Session;

class SettingsController extends Controller
{
    public function index(){

        return View::make('settings.settings');
    }
}
