<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\DriverVerifiedNotification;
use App\Notifications\DriverRejectedNotification;

class DriverController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'superadmin']);
    // }

    public function indexPending()
    {
        
        $pendingDrivers = User::where('verification_status', 'pending')->get();
        
        
        $rejectedDrivers = User::where('verification_status', 'rejected')->get();
    
       
        return view('superadmin.drivers.index-drivers', [
            'pendingDrivers' => $pendingDrivers,
            'rejectedDrivers' => $rejectedDrivers
        ]);
        
    }
    



    public function verify(User $user)
    {
       
        if ($user->verification_status !== 'pending') {
            return redirect()->route('superadmin.drivers.index-drivers')
                             ->with('error', 'User cannot be verified because the status is not pending.');
        }

      
        if (!$user->id_document) {
            return redirect()->route('superadmin.drivers.index-drivers')
                             ->with('error', 'User cannot be verified as no document has been uploaded.');
        }

   
        $user->update(['verification_status' => 'verified']);

        $user->notify(new DriverVerifiedNotification());

        return redirect()->route('superadmin.drivers.index-drivers')
                         ->with('success', 'User verified successfully');

                        
    }

   
    public function reject(User $user)
    {
      
        if ($user->verification_status !== 'pending') {
            return redirect()->route('superadmin.drivers.index-drivers')
                             ->with('error', 'User cannot be rejected because the status is not pending.');
        }

      
        $user->update(['verification_status' => 'rejected']);

        $user->notify(new DriverRejectedNotification());

        return redirect()->route('superadmin.drivers.index-drivers')
                         ->with('error', 'User rejected');

                      
    }

}
