<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Events\Notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Notifications\UserRejectedNotification;
use App\Notifications\UserVerifiedNotification;

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
                             ->with([
                                 'error' => 'Verification Failed',
                                 'description' => 'User cannot be verified because the status is not pending.'
                             ]);
        }


        if (!$user->id_document) {
            return redirect()->route('superadmin.users.index-users')
                ->with([
                    'error' => 'Verification Failed',
                    'description' => 'User cannot be verified as no document has been uploaded.'
                ]);
        }


        $user->update(['verification_status' => 'verified']);

        event(new Notifications(__('messages.Your profile has been verified successfully!'), $user->id));


        $user->notify(new UserVerifiedNotification());

        return redirect()->route('superadmin.users.index-users')
                         ->with('success', 'User verified successfully');


    }


    public function reject(User $user)
    {

        if ($user->verification_status !== 'pending') {
            return redirect()->route('superadmin.users.index-users')
                ->with([
                    'error' => 'Rejection Failed',
                    'description' => 'User cannot be rejected because the status is not pending.'
                ]);
        }


        $user->update(['verification_status' => 'rejected']);

        event(new Notifications(__('messages.Your profile has been Rejected!'), $user->id));


        $user->notify(new UserRejectedNotification());

        return redirect()->route('superadmin.users.index-users')
                         ->with('success', 'User rejected');


    }
    public function qrCode()
    {
        $user = auth()->user();
        $qrData = url("/user/check/{$user->uuid}");

        $qrCode = QrCode::size(200)->generate($qrData);
        return view('qr-code.qr-code', [
            'qrCode' => $qrCode,
            'user' => $user,
            'email' => $user->email,
            'image' => $user->image,
        ]);
    }

    public function scan()
    {
        return view('qr-code.qr-codeScaning');
    }

    public function userStatus($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        if ($user->image) {
            $user->image = asset('storage/' . $user->image);
        } else {
            $user->image = 'https://eu.ui-avatars.com/api/?name=' . urlencode($user->name . ' ' . $user->lastname) . '&size=250';
        }

        return view('qr-code.user-status', compact('user'));
    }
    public function getCitiesWithUserCount()
    {
        $cities = City::withCount('users') 
            ->get(['name as city_name', 'latitude', 'longitude']); 

        return response()->json($cities);
    }


}
