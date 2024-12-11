<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function __invoke($locale)
    {
       
        if (!in_array($locale, array_keys(config('localization.locales')))) {
            abort(400); 
        }

        
        session(['localization' => $locale]);

          


    

        
        return redirect()->back();
    }
    }
    
    


