<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\PeriodicPayment;
use App\Models\SubscriptionPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Date\Date;

class PeriodicPaymentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $subscriptions = Member::whereNotNull('approved_by')->orderBy('id', 'DESC')->get();
        $subscription_periods = SubscriptionPeriod::all();
        $max_period_no = SubscriptionPeriod::all()->max('period_no');
        $currency = 'ETB';
        return view('admin.manage.periodic_payments.index', compact(
            [
                'subscriptions',
                'subscription_periods',
                'max_period_no',
                'currency',
            ]
        ));
    }


    public function addPaymentDetail(Request $request)
    {

        //vallidate
        $request->validate([
            'payment_date' => 'required',
        ]);

        $member_id = $request->member_id;
        $subscription_period = $request->subscription_period;
        // $batch_id = $request->batch_id;

        // Get Subscription Period Id for current Batch and Period_no
        $subscription_period_id = SubscriptionPeriod::where('period_no', $subscription_period)
            ->value('id');
        // return "subscriptioN_period_id: " . $subscription_period_id;

        //payment_details
        $pmt_amount = $request->amount;

        // return $request->amount;
        $pmt_reciept_no = $request->reciept_no;
        $pmt_payment_date = $request->payment_date;
        $pmt_method = $request->method;

        //Add New Payment detail
        $subscription_period = SubscriptionPeriod::find($subscription_period_id);
        $subscription_period->members()
            ->syncWithPivotValues($member_id,
                [
                    'amount' => $pmt_amount,
                    'reciept_no' => $pmt_reciept_no,
                    'method' => $pmt_method,
                    'payment_date' => $pmt_payment_date,
                    'created_at' => Date::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Date::now()->format('Y-m-d H:i:s'),
                ]);

        //get the new subscription_period_id
        // $subscription_period_id = PeriodicPayment::where('member_id', 3)
        //     ->where('subscription_period_id', 3)
        //     ->value('id');

        // $batch = Batch::where('id', $batch_id);

        // $currency = $batch->value('currency');
        $currency = 'ETB';
        $subscription_type = '';
        $subscriber_name = '';
        $member = Member::where('id', $member_id)->first();
        $total_paid_for_member = $member->total_paid;

        return response()->json(['status' => 'success', 'message' => 'Payment Detail Added.',
            'subscription_period_id' => $subscription_period_id,
            'currency' => $currency,
            'subscription_type' => $subscription_type,
            'subscriber_name' => $subscriber_name,
            'id' => $member_id,
            // 'batch_id' => $batch_id,
            'total_paid' => $total_paid_for_member,

        ], 200);

    }

    public function editPaymentDetail(Request $request)
    {

        //vallidate
        $request->validate([
            'payment_date' => 'required',
        ]);

        $member_id = $request->member_id;
        $subscription_period_id = $request->subscription_period_id;

        //payment_details
        $pmt_amount = $request->amount;
        // return $request->amount;
        $pmt_reciept_no = $request->reciept_no;
        $pmt_payment_date = $request->payment_date;
        $pmt_method = $request->method;

        //Update Payment detail
        $subscription_period = SubscriptionPeriod::find($subscription_period_id);
        $subscription_period->members()
            ->syncWithPivotValues($member_id,
                [
                    'amount' => $pmt_amount,
                    'reciept_no' => $pmt_reciept_no,
                    'method' => $pmt_method,
                    'payment_date' => $pmt_payment_date,
                    'updated_at' => Date::now()->format('Y-m-d H:i:s'),

                ]);

        // $batch_id = Member::find($member_id)->first()->value('batch_id');

        // $batch = Batch::where('id', $batch_id);

        // $currency = $batch->value('currency');
        $currency = 'ETB';
        $subscription_type = '';
        $subscriber_name = '';
        $member = Member::where('id', $member_id)->first();
        $total_paid_for_member = $member->total_paid;

        return response()->json(['status' => 'success', 'message' => 'Payment Detail Updated.',
            'subscription_period_id' => $subscription_period_id,
            'currency' => $currency,
            'subscription_type' => $subscription_type,
            'subscriber_name' => $subscriber_name,
            'id' => $member_id,
            // 'batch_id' => $batch_id,
            'total_paid' => $total_paid_for_member,
        ], 200);

    }

    public function deletePaymentDetail($member_id, $subscription_period_id)
    {


        // $member_id = $request->member_id;
        // $subscription_period_id = $request->subscription_period_id;

        //Delete Payment detail
        // $subscription_period = SubscriptionPeriod::find($subscription_period_id);
        // $subscription_period->members()->where('')
        //     ->detach($member_id);
        // $batch_id = Member::find($member_id)->first()->value('batch_id');
        PeriodicPayment::where('member_id', $member_id)
            ->where('subscription_period_id', $subscription_period_id)->delete();

        // $batch = Batch::where('id', $batch_id)->first();
        // $currency = $batch->value('currency');
        $currency = 'ETB';
        $member = Member::where('id', $member_id)->first();
        $total_paid_for_member = $member->total_paid;

        // return 1;
        return response()->json(['status' => 'success', 'message' => 'Payment Detail Deleted.',
            // 'batch_id' => $batch_id,
            'currency' => $currency,
            'total_paid' => $total_paid_for_member,

        ], 200);

    }

    public function addPeriod(Request $request)
    {

        // try {
        $validated = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            'name' => 'required',
            // 'period_batch_id' => 'required',
        ]);

        // $batch_id = $request->period_batch_id;

        $subscription_period = new SubscriptionPeriod();

        // $subscription_period->batch_id = $batch_id;
        $subscription_period->name = $request->name;
        $subscription_period->from_date = $request->from_date;
        $subscription_period->to_date = $request->to_date;

        //get next period no for $batch_id
        $max_period_no = SubscriptionPeriod::all()->max('period_no'); //where('id', $batch_id)->first()->max_period_no;
        $period_no = $max_period_no + 1;

        $subscription_period->period_no = $period_no;

        $subscription_period->save();

        return response()->json(['status' => 'success', 'message' => 'New period added.', 'subscription_period' => $subscription_period], 200);

        // } catch (\Throwable $th) {

        // }
        // return response()->json(['status' => 'fail', 'message' => 'Unable to add period.']);
    }

    public function editPeriod(Request $request)
    {

        // try {
        $validated = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            // 'batch_id' => 'required',
            'name' => 'required',
            'subscription_period_id'  => 'required',
        ]);

        // $batch_id = $request->period_batch_id;
        $subscription_period_id = $request->subscription_period_id;

        $subscription_period = SubscriptionPeriod::find($subscription_period_id);

        $subscription_period->from_date = $request->from_date;
        $subscription_period->to_date = $request->to_date;
        $subscription_period->name = $request->name;

        $subscription_period->save();

        return response()->json(['status' => 'success', 'message' => 'Period Updated.', 'subscription_period' => $subscription_period], 200);

        // } catch (\Throwable $th) {

        // }
        // return response()->json(['status' => 'fail', 'message' => 'Unable to add period.']);
    }
}
