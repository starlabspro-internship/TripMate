<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead(Notification $notification){
        $notification->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function markAllAsRead()
    {
        Notification::where('user_id', auth()->id())->update(['is_read' => true]);
        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}
