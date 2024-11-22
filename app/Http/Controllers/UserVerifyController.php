<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserVerifiedNotification;
use App\Notifications\UserRejectedNotification;

class UserVerifyController extends Controller
{

    public function indexPending()
    {
        
        $pendingUsers = User::where('verification_status', 'pending')->get();
        
        
        $rejectedUsers = User::where('verification_status', 'rejected')->get();
    
       
        return view('superadmin.users.index-users', [
            'pendingUsers' => $pendingUsers,
            'rejectedUsers' => $rejectedUsers
        ]);
        
    }
    



    public function verify(User $user)
    {
       
        if ($user->verification_status !== 'pending') {
            return redirect()->route('superadmin.users.index-users')
                             ->with('error', 'User cannot be verified because the status is not pending.');
        }

      
        if (!$user->id_document) {
            return redirect()->route('superadmin.users.index-users')
                             ->with('error', 'User cannot be verified as no document has been uploaded.');
        }

   
        $user->update(['verification_status' => 'verified']);

        $user->notify(new UserVerifiedNotification());

        return redirect()->route('superadmin.users.index-users')
                         ->with('success', 'User verified successfully');

                        
    }

   
    public function reject(User $user)
    {
      
        if ($user->verification_status !== 'pending') {
            return redirect()->route('superadmin.users.index-users')
                             ->with('error', 'User cannot be rejected because the status is not pending.');
        }

      
        $user->update(['verification_status' => 'rejected']);

        $user->notify(new UserRejectedNotification());

        return redirect()->route('superadmin.users.index-users')
                         ->with('error', 'User rejected');

                      
    }

}
