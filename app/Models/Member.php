<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'maseb_code',
        'membership_status',
        'job_type',
        'profession',
        'special_talents',
        'heard_about_maseb_from',
        'not_forced_to_pay',
        'registration_method',
        'registration_date',
        'registration_fee_paid_amount',
        'registration_payment_method',
        'registered_at',
        'registered_by',
        'approved_at',
        'approved_by',
    ];



    protected $appends = [
        'subscriber_name',
        'subscriber',
        'payment_history',
        'total_paid',
        'max_period_no',
        'subscription_type',
        'currency',

    ];

    public function getSubscriptionTypeAttribute($value){
        return 'Monthly';
    }

    public function getCurrencyAttribute($value){
        return 'ETB';
    }

    public function getSubscriberAttribute($value)
    {
        $user = User::where('member_id', $this->id)->first();

        return $user;
    }

    public function subscriptionPayments()
    {
        $periodic_payments = DB::table('periodic_payments')
            ->where('member_id', $this->id)
            ->join('subscription_periods', 'periodic_payments.subscription_period_id', '=', 'subscription_periods.id')
            ->get();

        // return (object) [

        return $periodic_payments;

        // ];

    }

    public function getPaymentHistoryAttribute($value)
    {
        return $this->subscriptionPayments();
    }

    public function getTotalPaidAttribute($value)
    {

        $periodic_payments = DB::table('periodic_payments')
            ->where('member_id', $this->id)
            ->join('subscription_periods', 'periodic_payments.subscription_period_id', '=', 'subscription_periods.id')
            ->get();

        return $periodic_payments->sum('amount');
    }



    /**
     * The membership_types that belong to the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function membership_types()
    {
        return $this->belongsToMany(MembershipType::class, 'member_membership_type', 'member_id', 'membership_type_id')
            ->withPivot(
                'created_at',
                'created_by',
                'approved_at',
                'approved_by',
            );
            // ->withTimestamps();
    }

    /**
     * The membership_types that belong to the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function membership_levels()
    {
        return $this->belongsToMany(MembershipLevel::class, 'member_membership_level', 'member_id', 'membership_level_id')
            ->withPivot(
                'created_at',
                'created_by',
                'approved_at',
                'approved_by',
            );
            // ->withTimestamps();
    }

    /**
     * The subscription_periods that belong to the BatchUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscription_periods()
    {
        return $this->belongsToMany(SubscriptionPeriod::class, 'periodic_payments', 'member_id', 'subscription_period_id')
            ->withPivot(['amount', 'reciept_no', 'payment_date', 'method'])
            ->withTimestamps();
    }


    public function getSubscriberNameAttribute($value)
    {
        $user = User::where('member_id', $this->id)->first();

        return $user->full_name;
    }

    /**
     * Get the user that owns the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The departments that belong to the MemberMembershipLevel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_member', 'member_id', 'department_id')
            ->withPivot([

                'published_at',
                'published_by',
                'approved_at',
                'approved_by',
            ])
            ->withTimestamps();
    }




}
