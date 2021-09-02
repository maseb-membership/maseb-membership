<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SPatie\Permission\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    use SoftDeletes;

    public function renderedNotificationDropdownData($dropdown_state=false)
    {
        // abort_if(\Auth::user()->id == null, Response::HTTP_FORBIDDEN, 'Forbidden');

        $user = \Auth::user();

        return $user->renderedNotificationDropdownData($dropdown_state);

    }

    public function markAllNotificationAsRead($dropdown_state = false){
        // abort_if(\Auth::user()->id != $user_id, Response::HTTP_FORBIDDEN, 'Forbidden');

        $user = \Auth::user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        // return $user->renderedNotificationDropdownData($dropdown_state);
        return 'success';
    }

    public function markNotificationAsRead($notification_id, $dropdown_state = false){

        // abort_if(\Auth::user()->id != $user_id, Response::HTTP_FORBIDDEN, 'Forbidden');


        $user = \Auth::user();
        // return $user;

        foreach ($user->unreadNotifications as $notification) {
            if($notification_id == $notification->id){
                $notification->markAsRead();
                // return $user->renderedNotificationDropdownData($dropdown_state);

                break;
            }
        }
        return 'success';


    }
}
