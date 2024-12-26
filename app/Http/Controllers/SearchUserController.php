<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class SearchUserController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');  
    
        if ($query) {
            $users = User::where('name', 'like', "%$query%")
                ->orWhere('lastname', 'like', "%$query%")
                ->get([
                    'id', 'name', 'lastname', 'address', 'city', 'average_rating', 
                    'verification_status', 'background_status', 'image', 'email', 'birthday'
                ]);
    
            $users = $users->map(function ($user) {
                $user->age = $user->birthday ? \Carbon\Carbon::parse($user->birthday)->age : null;
                return $user;
            });
    
            return response()->json($users);
        }
    
        return response()->json([]);
    }
    
}