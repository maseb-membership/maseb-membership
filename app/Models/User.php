<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'grand_father_name',
        'gender',
        'member_id',
        'mother_name',
        'birthdate',
        'is_approved',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        // 'membership_type',
        // 'membership_level',

        // 'is_approved',
    ];

    protected $dispatchesEvents = [
        'created' => \App\Events\UserCreatedEvent::class,
        'updated' => \App\Events\UserUpdatedEvent::class,
    ];

    // public function getIsApprovedAttribute($value){
    //     return User::where('id',$this->id)->value('is_approved');
    // }
     /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

    // public function getMembershipTypeAttribute($value){
    //     $t = Member::find($this->member_id)->membership_types()->get();
    //     $name = end(end($t))['name'];
    //     return $name;
    // }

    // public function getMembershipLevelAttribute($value){
    //     $t = Member::find($this->member_id)->membership_levels()->get();
    //     $name = end(end($t))['name'];
    //     return $name;
    // }


    public function isSuperAdmin(): bool
    {
        // return $this->roles()->get()->contains(self::SUPER_ADMIN);
        return $this->hasRole('super-admin');
    }

    public function isSystemManager(): bool
    {
        // return $this->roles()->get()->contains(self::ADMIN);
        return $this->hasRole('system-manager');
    }

    public function isFinanceAdmin(): bool
    {
        // return $this->roles()->get()->contains(self::ADMIN);
        return $this->hasRole('finance-admin');
    }
    public function isMembershipAdmin(): bool
    {
        // return $this->roles()->get()->contains(self::ADMIN);
        return $this->hasRole('membership-admin');
    }

    public function isMemberUser(): bool
    {
        // return $this->roles()->get()->contains(self::DEFAULT_USER);
        return $this->hasRole('member-user');
    }


    public function fullName(): string
    {
        // return $this->name;
        return $this->name . ' ' . $this->last_name. ' ' . $this->grand_father_name;
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
