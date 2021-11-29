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

    public function renderedNotificationDropdownData($dropdown_state=false){
        $user = $this;
        $user_unreadNotifications = $user->unreadNotifications->all();

        $notification_count = count($user_unreadNotifications);

        $renderd_data = '';

        $renderd_data .= '<a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            '.(($notification_count!=0)?'<span class="badge badge-warning navbar-badge">'.$notification_count.'</span>':'').'
        </a>';

      $show_hide = ($dropdown_state==true)?'': '';
      $renderd_data .= '<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right '.$show_hide.'">';

      if($notification_count > 0){
        $renderd_data .= '<span class="dropdown-item dropdown-header ">'.$notification_count.'  Notification'.(($notification_count==1)?'':'s').'';
        $renderd_data .= '<span class="float-right position-relative "><button class="btn btn-xs btn-mark-all btn-outline-secondary align-right"><i class="fa fa-check"></i> Read All</button></span></span>';
        for ($i=0; $i < $notification_count ; $i++) {

            $notification = $user->unreadNotifications[$i];
            $type = $notification->data['type'].' ';

            if(strcmp($type, "user_welcome") == 1){
                $notification_item_user_id = $notification->data['user_id'];

                $notification_item_user_data = User::find($notification_item_user_id);

                $renderd_data .= '<div class="dropdown-divider"></div>
                    <span class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img style="width:45px;" src="'.$notification_item_user_data->profile_photo_url.'" alt="User Avatar" class="img-size-30 img-circle mr-2">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                '.'Welcome'.'
                                </h3>
                                <p class="text-sm">'.$notification->data['message'].'</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '.Date::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans().'</p>
                            </div>
                            <span class="mark-read mt-1 align-middle float-right"><button notification_id = "'.$notification->id.'" class="btn btn-xs btn-mark-read btn-outline-secondary align-right"><i class="fa fa-check"></i> Read</button></span>

                        </div>
                        <!-- Message End -->
                    </span>';
            }
            elseif(strcmp($type, "admin_user_account") == 1) {
                $notification_item_user_id = $notification->data['user_id'];

                $notification_item_user_data = User::find($notification_item_user_id);

                $renderd_data .= '<div class="dropdown-divider"></div>
                    <span class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <i class="fa fa-envelope p-2 mr-2" style="font-size: 30px;"></i>
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                '.'New User'.'
                                </h3>
                                <p class="text-sm">'.$notification_item_user_data->name.' has created an account.</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '.Date::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans().'</p>
                            </div>
                            <span class="mark-read mt-1 align-middle float-right"><button notification_id = "'.$notification->id.'" class="btn btn-xs btn-mark-read btn-outline-secondary align-right"><i class="fa fa-check"></i> Read</button></span>

                        </div>
                        <!-- Message End -->
                    </span>';
            }
            else {
                $renderd_data .= '<span class="dropdown-header">There are no Notifications</span>
                <div class="dropdown-divider"></div>';
            }

        }
      }

        $renderd_data .= '<div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>';

      return $renderd_data;
    }
}
