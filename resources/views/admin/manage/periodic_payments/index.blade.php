@extends('layouts.admin.index')

@section('page_title', 'Periodical Payments')


@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendors/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('vendors/admin/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css') }}">
    <style>


    </style>
@endsection

@section('header_title')
    Periodical Payments Management
@stop

{{-- @section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Admin</a></li>
<li class="breadcrumb-item">Batch (Addmes) </li>
<li class="breadcrumb-item active">Batch Subscriptions</li>
@endsection --}}

@section('navbar')
    @include('admin.navbar')
@endsection


@section('notifications-dropdown')
    @include('admin.navbar-notifications-dropdown')
@endsection

@section('mainsidebar')
    @include('admin.mainsidebar')
@endsection

@section('content')
    <div class="row .flex-md-row-reverse">
        {{-- <div class="col-sm-12 col-md-3  order-sm-2">

        {{-- @include('admin.manage.financees.subscriptions.sidebar')

    </div> --}}
        <div class="col-sm-12 col-md-12  order-sm-1">
            <div class="card" id="main-card">
                <div class="card-header">
                    <h3 class="card-title">Subscription Settings </h3>
                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-xs btn-secondary ml-2" data-toggle="modal"
                        data-target="#periodModal"><i class="fa fa-plus">
                        </i> Add Period</button>


                    <div class="card-tools">

                        <!-- Collapse Button -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                </div>

                <div class="card-body">

                    <table id="subscriptionTable" style="width:100%;"
                        class="table table-striped table-bordered table-hover ">
                        <caption>List of Members</caption>
                        <thead>
                            <tr>
                                {{-- <th scope="col"><input type="checkbox" id="chkCheckAll" /></th> --}}
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                {{-- <th scope="col">Approval</th> --}}
                                {{-- <th style="text-align: center;" scope="col">Active</th> --}}
                                {{-- <th scope="col">Joined</th> --}}
                                @for ($i = 1; $i <= $subscription_periods[0]->max_period_no; $i++)
                                    <th scope="col">
                                        <a href="javascript:void(0);" class="btn-edit-period"
                                            period_name="{{ $subscription_periods[$i - 1]->name }}"
                                            subscription_period_id="{{ $subscription_periods[$i - 1]->id }}"
                                            from_date="{{ $subscription_periods[$i - 1]->from_date }}"
                                            to_date="{{ $subscription_periods[$i - 1]->to_date }}"
                                            data-toggle="tooltip"
                                            title="{{ $i }} | {{ $subscription_periods[$i - 1]->name }} ({{ $subscription_periods[$i - 1]->from_date }} - {{ $subscription_periods[$i - 1]->to_date }})">{{ $i }}
                                            <i class="fa fa-edit"></i></a>



                                @endfor
                                <th scope="col">Total</th>
                                {{-- <th scope="col"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $subscription)
                                <tr id="subscriptionid{{ $subscription->id }}" style="height:90px;">
                                    {{-- <td class="align-middle"><input type="checkbox" name="ids" class="checkBoxClass "
                                            value="{{ $subscription->id }}" /></td> --}}
                                    <th scope="row" class="align-middle"> {{ $subscription->id }}</th>
                                    <td class="align-middle">
                                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                            <div class="d-none d-lg-block image align-middle"
                                                style="margin-top: auto; margin-bottom: auto;">
                                                <img src="{{ $subscription->subscriber->profile_photo_url }}"
                                                    alt="{{ $subscription->subscriber->name }}"
                                                    style="width:54px; height: 54px;"
                                                    class="align-middle rounded-circle elevation-1">
                                            </div>
                                            <div class="info" style="display: grid;">
                                                <strong>{{ $subscription->subscriber_name }}</strong>
                                                <span
                                                    class="d-none d-sm-block text-sm">{{ $subscription->subscriber->email }}</span>
                                                <span class="text-md mt-1">Joined at:</span>
                                                <span class="text-sm">{{ $subscription->created_at }}</span>
                                                <span
                                                    class="text-xs text-muted">{{ $subscription->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td class="align-middle">
                                        <div class="text-center">
                                            @if ($subscription->approved)
                                                Approved
                                            @else
                                                <button type="button" class="btn btn-xs btn-success btn-approve"
                                                    subscriptionid="{{ $subscription->id }}"><i class="fa fa-check">
                                                    </i> Approve</button>
                                            @endif
                                        </div>
                                    </td> --}}
                                    {{-- <td class="align-middle">
                                        <div class="text-center">
                                            @if ($subscription->active === 1)
                                                <a href="javascript:void(0);"
                                                    class="text-cetner  text-lg btn-toggle-active active"
                                                    subscriptionid="{{ $subscription->id }}">
                                                    <i style="color: green;" class="fa fa-check"></i></a>
                                            @else
                                                <a href="javascript:void(0);" class="text-cetner  text-lg btn-toggle-active"
                                                    subscriptionid="{{ $subscription->id }}">
                                                    <i style="color: red;" class="fa fa-times"></i></a>
                                            @endif
                                        </div>
                                    </td> --}}
                                    {{-- <td>
                                    </td> --}}
                                    {{-- {{ dd($subscription->max_period_no) }} --}}
                                    {{-- @php
                                        $subscription_periods = $batch->subscriptionPeriods;

                                    @endphp --}}

                                    @for ($i = 1; $i <= $max_period_no; $i++)

                                        @php
                                            $found = false;
                                        @endphp
                                        {{-- @foreach ($batch->subscriptionPeriods as $subscription_period) --}}
                                        {{-- @if ($subscription_period->period_no == $i) --}}
                                        {{-- @if ($payment->id) --}}
                                        @foreach ($subscription->payment_history as $payment)
                                            @php

                                                $pmt_id = '';
                                                $pmt_amount = 0;
                                                $pmt_reciept_no = '';
                                                $pmt_from_date = '';
                                                $pmt_to_Date = '';
                                                $pmt_method = '';
                                                $pmt_payment_date = '';
                                                $found = false;
                                            @endphp
                                            @if ($payment->period_no == $i)
                                                @php
                                                    $pmt_id = $payment->id;
                                                    $pmt_amount = $payment->amount;
                                                    $pmt_reciept_no = $payment->reciept_no;
                                                    $pmt_from_date = $payment->from_date;
                                                    $pmt_to_date = $payment->to_date;
                                                    $pmt_method = $payment->method;
                                                    $pmt_payment_date = $payment->payment_date;
                                                    $pmt_subscription_period_id = $payment->subscription_period_id;
                                                    $found = true;
                                                @endphp
                                                {{-- @continue --}}

                                                <td scope="col" id="{{ $subscription->id . '-' . $i }}"
                                                    class="table-success align-middle">
                                                    <div class="text-center"
                                                        style="margin-top: auto; margin-bottom: auto; align:middle;">
                                                        <strong>{{ $pmt_amount . ' ' . $subscription->currency }}</strong>
                                                    </div>
                                                    <div class="btn-group btn-pmt">
                                                        <button title="Payment Menu List" type="button"
                                                            class="btn btn-xs btn-success dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="px-1  fa fa-list">
                                                            </i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item mnu_show_payment"
                                                                href="javascript:void(0);"
                                                                pmt_member_id="{{ $subscription->id }}"
                                                                pmt_subscription_period="{{ $i }}"
                                                                pmt_subscription_period_id="{{ $pmt_subscription_period_id }}"
                                                                pmt_subscription_type="{{ $subscription->subscription_type }}"
                                                                pmt_subscriber_name="{{ $subscription->subscriber_name }}"
                                                                pmt_amount="{{ $pmt_amount }}"
                                                                pmt_reciept_no="{{ $pmt_reciept_no }}"
                                                                pmt_from_date="{{ $pmt_from_date }}"
                                                                pmt_to_date="{{ $pmt_to_date }}"
                                                                pmt_method="{{ $pmt_method }}"
                                                                pmt_payment_date="{{ $pmt_payment_date }}">
                                                                <i class="px-1  fa fa-list">
                                                                </i><span> Detail</span>
                                                            </a>
                                                            <a class="dropdown-item mnu_edit_payment"
                                                                pmt_id="{{ $pmt_id }}"
                                                                pmt_member_id="{{ $subscription->id }}"
                                                                pmt_subscription_period="{{ $i }}"
                                                                pmt_subscription_period_id="{{ $pmt_subscription_period_id }}"
                                                                pmt_subscription_type="{{ $subscription->subscription_type }}"
                                                                pmt_subscriber_name="{{ $subscription->subscriber_name }}"
                                                                pmt_amount="{{ $pmt_amount }}"
                                                                pmt_reciept_no="{{ $pmt_reciept_no }}"
                                                                pmt_from_date="{{ $pmt_from_date }}"
                                                                pmt_to_date="{{ $pmt_to_date }}"
                                                                pmt_method="{{ $pmt_method }}"
                                                                pmt_payment_date="{{ $pmt_payment_date }}"
                                                                href="javascript:void(0);">
                                                                <i class="px-1  fa fa-edit">
                                                                </i><span> Edit</span>
                                                            </a>

                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item btn-remove-payment"
                                                                pmt_member_id="{{ $subscription->id }}"
                                                                pmt_subscription_period_id="{{ $pmt_subscription_period_id }}"
                                                                pmt_subscription_period="{{ $i }}"
                                                                pmt_subscription_type="{{ $subscription->subscription_type }}"
                                                                pmt_subscriber_name="{{ $subscription->subscriber_name }}"
                                                                href="#"> <i class="px-1  fa fa-times">
                                                                </i><span> Remove</a></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        @break ($payment->period_no == $i)

                                    @endforeach

                                    {{-- @endforeach --}}
                                    @if (!$found)
                                        {{-- <td scope="col" id="{{ $subscription->id . '-' . $i }}"
                                                class="table-success align-middle">
                                                <div class="text-center"
                                                    style="margin-top: auto; margin-bottom: auto; align:middle;">
                                                    <strong>{{ $pmt_amount . ' ' . $subscription->currency }}</strong>
                                                </div>
                                                <div class="btn-group btn-pmt">
                                                    <button title="Payment Menu List" type="button"
                                                        class="btn btn-xs btn-success dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="px-1  fa fa-list">
                                                        </i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item mnu_show_payment"
                                                            href="javascript:void(0);" pmt_id="{{ $pmt_id }}"
                                                            pmt_member_id="{{ $subscription->id }}"
                                                            pmt_subscription_period="{{ $i }}"
                                                            pmt_subscription_period_id="{{ $pmt_subscription_period_id }}"
                                                            pmt_subscription_type="{{ $subscription->subscription_type }}"
                                                            pmt_subscriber_name="{{ $subscription->subscriber_name }}"
                                                            pmt_amount="{{ $pmt_amount }}"
                                                            pmt_reciept_no="{{ $pmt_reciept_no }}"
                                                            pmt_from_date="{{ $pmt_from_date }}"
                                                            pmt_to_date="{{ $pmt_to_date }}"
                                                            pmt_method="{{ $pmt_method }}"
                                                            pmt_payment_date="{{ $pmt_payment_date }}">
                                                            <i class="px-1  fa fa-list">
                                                            </i><span> Detail</span>
                                                        </a>
                                                        <a class="dropdown-item mnu_edit_payment"
                                                            pmt_id="{{ $pmt_id }}"
                                                            pmt_member_id="{{ $subscription->id }}"
                                                            pmt_subscription_period="{{ $i }}"
                                                            pmt_subscription_period_id="{{ $pmt_subscription_period_id }}"
                                                            pmt_subscription_type="{{ $subscription->subscription_type }}"
                                                            pmt_subscriber_name="{{ $subscription->subscriber_name }}"
                                                            pmt_amount="{{ $pmt_amount }}"
                                                            pmt_reciept_no="{{ $pmt_reciept_no }}"
                                                            pmt_from_date="{{ $pmt_from_date }}"
                                                            pmt_to_date="{{ $pmt_to_date }}"
                                                            pmt_method="{{ $pmt_method }}"
                                                            pmt_payment_date="{{ $pmt_payment_date }}"
                                                            href="javascript:void(0);">
                                                            <i class="px-1  fa fa-edit">
                                                            </i><span> Edit</span>
                                                        </a>

                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item btn-remove-payment"
                                                            pmt_member_id="{{ $subscription->id }}"
                                                            pmt_subscription_period_id="{{ $pmt_subscription_period_id }}"
                                                            pmt_subscription_period="{{ $i }}"
                                                            href="#"> <i class="px-1  fa fa-times">
                                                            </i><span> Remove</a></span>
                                                    </div>
                                                </div>
                                            </td> --}}
                                        @php
                                            // $found = false;
                                        @endphp
                                        {{-- @else --}}
                                        <td scope="col" id="{{ $subscription->id . '-' . $i }}" class=" align-middle">
                                            <button title="Add Payment Detail" type="button"
                                                class="btn btn-sm btn-danger ml-2 btn_add_payment" data-toggle="modal"
                                                data-target="#paymentModal" data-member_id="{{ $subscription->id }}"
                                                data-subscription_period="{{ $i }}"
                                                data-subscription_type="{{ $subscription->subscription_type }}"
                                                data-subscriber_name="{{ $subscription->subscriber_name }}">

                                                <i class="fa fa-plus">
                                                </i></button>
                                        </td>

                                    @endif
                            @endfor
                            <td class="align-middle" id="total{{ $subscription->id }}">
                                <strong>{{ $subscription->total_paid . ' ' . $subscription->currency }}</strong>
                            </td>
                            {{-- <td id="{{ $subscription->id }}">
                                <div class="row">

                                </div>

                            </td> --}}
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="card-footer">
                </div>

            </div>

        </div>

    </div>


@endsection


@section('modals')

    <!-- Add New Payment Modal -->
    @include('admin.manage.periodic_payments.payments.create_modal')

    <!-- Edit Payment Modal -->
    @include('admin.manage.periodic_payments.payments.edit_modal')

    <!-- Payment Detail Modal -->
    @include('admin.manage.periodic_payments.payments.detail_modal')

    <!-- Add Period Modal -->
    @include('admin.manage.periodic_payments.periods.create_modal')

    <!-- Edit Period Modal -->
    @include('admin.manage.periodic_payments.periods.edit_modal')

@endsection


@section('js')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('vendors/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('vendors/admin/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.js') }}"></script>
    <script src="{{ asset('vendors/admin/plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js') }}">
    </script>



    <script type="text/javascript">
        $(function() {
            $('#period_from_date').datetimepicker();
            $('#period_to_date').datetimepicker({
                useCurrent: false
            });
            $("#period_from_date").on("change.datetimepicker", function(e) {
                $('#period_to_date').datetimepicker('minDate', e.date);
            });
            $("#period_to_date").on("change.datetimepicker", function(e) {
                $('#period_from_date').datetimepicker('maxDate', e.date);
            });



            $('#period_from_date_ed').datetimepicker();
            $('#period_to_date_ed').datetimepicker({
                useCurrent: false
            });
            $("#period_from_date_ed").on("change.datetimepicker", function(e) {
                $('#period_to_date_ed').datetimepicker('minDate', e.date);
            });
            $("#period_to_date_ed").on("change.datetimepicker", function(e) {
                $('#period_from_date_ed').datetimepicker('maxDate', e.date);
            });
        });
    </script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function payment_cell_empty_template(response, i) {

            td_pymt_cell = `<td scope="col" id="${response.id }-${i}"
                class=" align-middle">
                <button title="Add Payment Detail" type="button"
                    class="btn btn-sm btn-danger ml-2 btn_add_payment" data-toggle="modal"
                    data-target="#paymentModal"

                    data-member_id="${response ? response.id : ''}"

                data-subscription_period="${i}"
                data-subscription_type="${response.subscription_type}"
                data-subscriber_name="${response.subscriber_name}"
                >

                    <i class="fa fa-plus">
                    </i></button>
            </td>`;

            return td_pymt_cell;
        }

        function payment_cell_data_template(
            response,
            i,
            pmt_amount,
            pmt_reciept_no,
            pmt_subscription_period_id,
            pmt_from_date,
            pmt_to_date,
            pmt_method,
            pmt_payment_date) {

            td_pymt_cell = `<td scope="col" id="${response.id}-${i}"
                                class="table-success align-middle">
                                <div class="text-center"
                                    style="margin-top: auto; margin-bottom: auto; align:middle;">
                                    <strong>${pmt_amount} ${response.currency}</strong>
                                </div>
                                <div class="btn-group btn-pmt">
                                    <button title="Payment Menu List" type="button"
                                        class="btn btn-xs btn-success dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="px-1  fa fa-list">
                                        </i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item mnu_show_payment"
                                            href="javascript:void(0);"
                                            pmt_member_id="${response.id}"
                                            pmt_subscription_period="${i}"
                                            pmt_subscription_period_id="${pmt_subscription_period_id}"
                                            pmt_subscription_type="${response.subscription_type}"
                                            pmt_subscriber_name="${response.subscriber_name}"
                                            pmt_amount="${pmt_amount}"
                                            pmt_reciept_no="${pmt_reciept_no}"
                                            pmt_from_date="${pmt_from_date}"
                                            pmt_to_date="${pmt_to_date}"
                                            pmt_method="${pmt_method}"
                                            pmt_payment_date="${pmt_payment_date}"
                                            >
                                            <i class="px-1  fa fa-list">
                                            </i><span> Detail</span>
                                        </a>
                                        <a class="dropdown-item mnu_edit_payment"
                                            href="javascript:void(0);"
                                            pmt_member_id="${response.id}"
                                            pmt_subscription_period="${i}"
                                            pmt_subscription_period_id="${pmt_subscription_period_id}"
                                            pmt_subscription_type="${response.subscription_type}"
                                            pmt_subscriber_name="${response.subscriber_name}"
                                            pmt_amount="${pmt_amount}"
                                            pmt_reciept_no="${pmt_reciept_no}"
                                            pmt_from_date="${pmt_from_date}"
                                            pmt_to_date="${pmt_to_date}"
                                            pmt_method="${pmt_method}"
                                            pmt_payment_date="${pmt_payment_date}"
                                            >
                                            <i class="px-1  fa fa-edit">
                                            </i><span> Edit</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item btn-remove-payment"
                                            pmt_member_id="${response.id}"
                                            pmt_subscription_period_id="${pmt_subscription_period_id}"
                                            pmt_subscription_period="${i}"
                                            pmt_subscription_type="${response.subscription_type}"
                                            pmt_subscriber_name="${response.subscriber_name}"
                                            href="#"> <i class="px-1  fa fa-times">
                                            </i><span> Remove</a></span>
                                    </div>
                                </div>
                            </td>`;

            return td_pymt_cell;
        }

        $(function() {

            //Initialize Select2 Elements

            // Do this before you initialize any of your modals
            // $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            $('.select-subscribers').select2({
                theme: 'bootstrap4',
                dropdownParent: $('#subscriptionModal')
            });
            initSubscriptionTable();

            initialise_pmt_mnu();


            initdatetimePicker();



        });

        function initdatetimePicker() {
            $('#pmt_edit_payment_date').datetimepicker({
                format: "L"
            });
            $('#pmt_create_payment_date').datetimepicker({
                format: "L"
            });

            $('#period_from_date').datetimepicker({
                format: "L"
            });
            $('#period_to_date').datetimepicker({
                format: "L"
            });


            $('#period_from_date_ed').datetimepicker({
                format: "L"
            });
            $('#period_to_date_ed').datetimepicker({
                format: "L"
            });
        };

        function initSubscriptionTable() {
            $("#subscriptionTable").DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            // columns: [ 0, 1, 2, 5 ]
                        }
                    },
                    'colvis'
                ],
                // scrollY: "300px",
                // responsive: true,
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 2,
                    rightColumns: 1
                },
                // buttons: [
                //     'copy', 'excel', 'pdf'
                // ],
                'createdRow': function(row, data, dataIndex) {

                    // index = 'subscriptionid="';
                    // startOffset = data.toString().search(index); // + index.toString().length;
                    // trimmed = data.toString().substr(0, 10);
                    // endOffset = trimmed.toString().search('"');
                    // startOffset -= 2;
                    // endOffset = 2;
                    // id = trimmed.toString().substr(startOffset, endOffset);
                    // console.log($(' th:nth-child(2)', row).html());
                    if ($(' th:nth-child(0)', row).html() != undefined) {
                        idAttribute = 'subscriptionid' + $(' th:nth-child(0)', row).html().toString().replace(
                            ' ', '');
                        $(row).attr('id', idAttribute);
                    }
                    // alert(startOffset+' , '+ endOffset + "\n" + data);

                },
                'columnDefs': [{
                    orderable: false,
                    targets: 0
                }],
                order: [
                    [1, 'desc']
                ],
            }).buttons().container().appendTo('#subscriptionTable_wrapper .col-md-6:eq(0)');
        }





        $('.dt-buttons .btn').addClass('btn-xs px-1');


        //Handle Add Period Modal...
        $('#periodModal').on('hide.bs.modal', function(event) {
            $('#periodForm')[0].reset();
        });

        $('#periodModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
        });

        //Handle Edit Period Modal...
        $('#periodEditModal').on('hide.bs.modal', function(event) {
            $('#periodEditForm')[0].reset();

            $('#period_from_date_ed').datetimepicker("date", null);

            $('#period_to_date_ed').datetimepicker("date", null);

        });

        $('#periodEditModal').on('show.bs.modal', function(event) {
            //
        });

        $('.btn-edit-period').on('click', function(e) {

            let _token = $('input[name=_token]').val();

            let from_date = $(this).attr('from_date');
            let to_date = $(this).attr('to_date');
            let subscription_period_id = $(this).attr('subscription_period_id');
            let name = $(this).attr('period_name');

            // alert(subscription_period_id);
            $('#period_from_date_ed').datetimepicker('date', moment(from_date, 'YYYY-MM-DD'));
            $('#period_to_date_ed').datetimepicker('date', moment(to_date, 'YYYY-MM-DD'));
            $('#period_name_ed').val(name);
            $('#subscription_period_id_ed').val(subscription_period_id);

            $('#periodEditModal').modal('toggle');
        });

        //Period Modal - Add New
        $('#periodForm').on('submit', function(e) {
            e.preventDefault();

            let url = "{{ route('admin.manage.finance.addperiod') }}";
            let _token = $('input[name=_token]').val();

            from_date = $('#period_from_date').datetimepicker('date').format('YYYY-MM-DD HH:mm:ss');
            to_date = $('#period_to_date').datetimepicker('date').format('YYYY-MM-DD HH:mm:ss');
            name = $('#period_name').val();

            formData = new FormData(this);
            formData.append('from_date', from_date);
            formData.append('to_date', to_date);
            formData.append('name', name);



            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    //Refresh page.
                    let url = "{{ route('admin.manage.finance.index') }}";


                    window.location.replace(url);

                },
                error: function(xhr) {},
            });

        });

        //Period Modal - Edit
        $('#periodEditForm').on('submit', function(e) {
            e.preventDefault();

            let url = "{{ route('admin.manage.finance.editperiod') }}";
            let _token = $('input[name=_token]').val();

            let from_date = $('#period_from_date_ed').datetimepicker('date').format('YYYY-MM-DD HH:mm:ss');
            let to_date = $('#period_to_date_ed').datetimepicker('date').format('YYYY-MM-DD HH:mm:ss');
            let name = $('#period_name_ed').val();
            let subscription_period_id = $('#subscription_period_id_ed').val();

            formData = new FormData(this);
            formData.append('from_date', from_date);
            formData.append('to_date', to_date);
            formData.append('name', name);
            formData.append('subscription_period_id', subscription_period_id);


            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    //Refresh page.
                    let url = "{{ route('admin.manage.finance.index') }}";

                    window.location.replace(url);

                },
                error: function(xhr) {},
            });
        });





        $(document).ready(function() {

            $('#subscription_type').on('change', function(e) {
                // alert('here');
                $("#selYear").val(0);
                $("#selMonth").val(0);

            });

        });








        //Handle Add New Modal...
        $('#subscriptionModal').on('hide.bs.modal', function(event) {
            $('#subscriptionForm')[0].reset();
        });

        //Payment Modal - Show/Hide Add New Modal Form
        $('#paymentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal

            let member_id = button.data('member_id');
            let subscription_period = button.data('subscription_period');
            let period_no = button.data('subscription_period');
            let subscription_type = button.data('subscription_type');
            let subscriber_name = button.data('subscriber_name');
            let amount = button.data('amount');
            let reciept_no = button.data('reciept_no');
            // let from_date = button.data('from_date');
            // let to_date = button.data('to_date');
            let method = button.data('method');
            let payment_date = button.data('payment_date');

            $('#pmt_create_member_id').val(member_id);
            $('#pmt_create_subscription_period').val(subscription_period);
            $('#pmt_create_period_no').val(`${period_no + ' (' + subscription_type + ')'}`);
            $('#pmt_create_subscriber_name').val(subscriber_name);

            $('#pmt_create_payment_date').datetimepicker('date', payment_date);
            $('#pmt_create_amount').val(amount);
            $('#pmt_create_select_method').val(method);
            $('#pmt_create_reciept_no').val(reciept_no);

            // $('#paymentModal').modal('show');
        });

        $('#paymentModal').on('hide.bs.modal', function(event) {
            $('#paymentAddForm')[0].reset();
        });

        //Payment Modal - Submit Add New Form
        $('#paymentForm').on('submit', function(e) {
            e.preventDefault();
            // let id = $('#pmt_edit_id');
            let member_id = $('#pmt_create_member_id').val();
            let subscription_period = $('#pmt_create_subscription_period').val();
            // let period_no = $('#pmt_create_subscription_period');
            // let subscription_type = $('#pmt_create_subscription_type');
            // let subscriber_name = $('#pmt_create_subscriber_name');
            let amount = $('#pmt_create_amount').val();
            let reciept_no = $('#pmt_create_reciept_no').val();
            // let from_date = $('#pmt_create_from_date').val();
            // let to_date = $('#pmt_create_to_date').val();
            let method = $('#pmt_create_select_method').val();
            let payment_date = $('#pmt_create_payment_date').datetimepicker('date').format('YYYY-MM-DD HH:mm:ss');
            // save...

            let url = "{{ route('admin.manage.finance.addpayment') }}";
            let _token = $('input[name=_token]').val();

            formData = new FormData(this);
            formData.append('amount', amount);
            formData.append('reciept_no', reciept_no);
            formData.append('method', method);
            formData.append('payment_date', payment_date);
            formData.append('subscription_period', subscription_period);
            formData.append('member_id', member_id);

            let that = $(this);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,

                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        //hide modal
                        $("#paymentModal").modal('hide');
                        $("#paymentForm")[0].reset();

                        //update cell
                        var table = $('#subscriptionTable').DataTable();

                        td_pymt_cell = payment_cell_data_template(
                            response,
                            subscription_period,
                            amount,
                            reciept_no,
                            response.subscription_period_id,
                            '',
                            '',
                            method,
                            payment_date
                        );
                        // console.log(td_pymt_cell);
                        // alert('hdre');

                        var cell = table.cell($('#' + member_id + '-' + subscription_period));
                        cell.data(td_pymt_cell).draw();

                        //total paid
                        cell = table.cell($('#total' + member_id));
                        total_paid = "<strong>" + response.total_paid + " " + response.currency +
                            "</strong>";

                        cell.data(total_paid).draw();

                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            html: '',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000
                        });

                        initialise_pmt_mnu();
                    }
                },
                error: function(xhr) {
                    // $('#validation-errors').html('');
                    let errMsgs = "";
                    // $.each(xhr.responseJSON.errors, function(key, value) {
                    //     $('#validation-errors').append('<div class="alert alert-danger">' +
                    //         value + '</div');
                    //     errMsgs += '' + value + '<br/>';


                    // });

                    Swal.fire({
                        icon: 'error',
                        title: xhr.responseJSON.message,
                        html: errMsgs,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });

                }
            });
        });

        //Payment Modal - Submit Edit Form
        $('#paymentEditForm').on('submit', function(e) {
            e.preventDefault();
            // let id = $('#pmt_edit_id');
            let member_id = $('#pmt_edit_member_id').val();
            let subscription_period_id = $('#pmt_edit_subscription_period_id').val();
            let subscription_period = $('#pmt_edit_subscription_period').val();
            // let subscription_type = $('#pmt_edit_subscription_type');
            // let subscriber_name = $('#pmt_edit_subscriber_name');
            let amount = $('#pmt_edit_amount').val();
            let reciept_no = $('#pmt_edit_reciept_no').val();
            // let from_date = $('#pmt_edit_from_date').val();
            // let to_date = $('#pmt_edit_to_date').val();
            let method = $('#pmt_edit_select_method').val();
            let payment_date = $('#pmt_edit_payment_date').datetimepicker('date').format('YYYY-MM-DD HH:mm:ss')
            // save...

            let url = "{{ route('admin.manage.finance.editpayment') }}";
            let _token = $('input[name=_token]').val();

            formData = new FormData(this);
            formData.append('amount', amount);
            formData.append('reciept_no', reciept_no);
            formData.append('method', method);
            formData.append('payment_date', payment_date);
            formData.append('subscription_period_id', subscription_period_id);
            formData.append('member_id', member_id);



            $.ajax({
                url: url,
                type: 'POST',
                data: formData,

                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        // hide modal
                        $('#paymentEditModal').modal('hide');
                        $("#paymentEditForm")[0].reset();

                        //update cell
                        var table = $('#subscriptionTable').DataTable();

                        td_pymt_cell = payment_cell_data_template(
                            response,
                            subscription_period,
                            amount,
                            reciept_no,
                            response.subscription_period_id,
                            '',
                            '',
                            method,
                            payment_date
                        );

                        td = $('#' + member_id + '-' + subscription_period);
                        console.log(td);
                        table.cell(td)
                            .data(td_pymt_cell)
                            .draw();


                        //total paid
                        cell = table.cell($('#total' + member_id));
                        total_paid = "<strong>" + response.total_paid + " " + response.currency +
                            "</strong>";

                        cell.data(total_paid).draw();


                        Swal.fire({
                            icon: 'warning',
                            title: response.message,
                            html: '',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000
                        });

                        initialise_pmt_mnu();
                    }
                },
                error: function(xhr) {
                    // $('#validation-errors').html('');
                    let errMsgs = "";
                    // $.each(xhr.responseJSON.errors, function(key, value) {
                    //     $('#validation-errors').append('<div class="alert alert-danger">' +
                    //         value + '</div');
                    //     errMsgs += '' + value + '<br/>';


                    // });
                    Swal.fire({
                        icon: 'error',
                        title: xhr.responseJSON.message,
                        html: errMsgs,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });
                }
            });
        });

        function initialise_pmt_mnu() {

            //Payment Modal - Show Detail
            $('.mnu_show_payment').on('click', function(e) {
                let id = $(this).attr('pmt_id');
                let period_no = $(this).attr('pmt_subscription_period');
                let subscription_type = $(this).attr('pmt_subscription_type');
                let subscriber_name = $(this).attr('pmt_subscriber_name');
                let amount = $(this).attr('pmt_amount');
                let reciept_no = $(this).attr('pmt_reciept_no');
                let from_date = $(this).attr('pmt_from_date');
                let to_date = $(this).attr('pmt_to_date');
                let method = $(this).attr('pmt_method');
                let payment_date = $(this).attr('pmt_payment_date');

                // $('pmt_show_member_id').val(id);
                $('#pmt_show_period_no').val(`${period_no + ' (' + subscription_type + ')'}`);
                $('#pmt_show_subscriber_name').val(subscriber_name);
                $('#pmt_show_payment_date').datetimepicker('date', payment_date);
                $('#pmt_show_amount').val(amount);
                $('#pmt_show_method').val(method);
                $('#pmt_show_reciept_no').val(reciept_no);
                // $('pmt_show_member_id').val(id);
                $('#paymentModalDetail').modal('show');
            });

            //Payment Modal - Show Edit Form
            $('.mnu_edit_payment').on('click', function(e) {
                let id = $(this).attr('pmt_id');
                let member_id = $(this).attr('pmt_member_id');
                let subscription_period_id = $(this).attr('pmt_subscription_period_id');
                let subscription_period = $(this).attr('pmt_subscription_period');
                let period_no = $(this).attr('pmt_subscription_period');
                let subscription_type = $(this).attr('pmt_subscription_type');
                let subscriber_name = $(this).attr('pmt_subscriber_name');
                let amount = $(this).attr('pmt_amount');
                let reciept_no = $(this).attr('pmt_reciept_no');
                let from_date = $(this).attr('pmt_from_date');
                let to_date = $(this).attr('pmt_to_date');
                let method = $(this).attr('pmt_method');
                let payment_date = $(this).attr('pmt_payment_date');

                $('#pmt_edit_member_id').val(member_id);
                $('#pmt_edit_subscription_period_id').val(subscription_period_id);
                $('#pmt_edit_subscription_period').val(subscription_period);
                $('#pmt_edit_period_no').val(`${period_no + ' (' + subscription_type + ')'}`);
                $('#pmt_edit_subscriber_name').val(subscriber_name);

                $('#pmt_edit_payment_date').datetimepicker('date', payment_date);
                $('#pmt_edit_amount').val(amount);
                $('#pmt_edit_select_method').val(method);
                $('#pmt_edit_reciept_no').val(reciept_no);
                // $('pmt_show_member_id').val(id);
                $('#paymentEditModal').modal('show');
            });

            //Payment Remove
            $('.btn-remove-payment').on('click', function(e) {
                let member_id = $(this).attr('pmt_member_id');
                let subscription_period_id = $(this).attr('pmt_subscription_period_id');
                let subscription_period = $(this).attr('pmt_subscription_period');
                let subscription_type = $(this).attr('pmt_subscription_type');
                let subscriber_name = $(this).attr('pmt_subscriber_name');



                url =
                    "{{ route('admin.manage.finance.deletepayment', ['member_id' => ':member_id', 'subscription_period_id' => ':subscription_period_id']) }}";
                url = url.replace(':member_id', member_id);
                url = url.replace(':subscription_period_id', subscription_period_id);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            // replace table cell.
                            var table = $('#subscriptionTable').DataTable();
                            var cell = table.cell($('#' + member_id + '-' + subscription_period));

                            var response = $.parseJSON('{ "id": "' + member_id + '", ' +
                                '"subscription_type": "' + subscription_type + '", ' +
                                '"subscriber_name": "' + subscriber_name + '" }');

                            td_pymt_cell = payment_cell_empty_template(response, subscription_period);
                            cell.data(td_pymt_cell).draw();

                            //total paid

                            td = $('#total' + member_id);
                            cell = table.cell(td);
                            total_paid = "<strong>" + response.total_paid + " " + response.currency +
                                "</strong>";

                            cell.data(total_paid).draw();

                            Swal.fire({
                                icon: 'warning',
                                title: response.message,
                                html: 'Payment Data Removed',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000
                            });
                        }
                    },
                    error: function(xhr) {
                        let errMsgs = "";

                        Swal.fire({
                            icon: 'error',
                            title: xhr.responseJSON.message,
                            html: errMsgs,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000
                        });
                    }

                });
            });
        };






        //Edit Subscription
        // ...

        //Delete Subscription Meta and its related files
        // ...


        //Multiple Delete Subscriptions and their related files
        // ...
    </script>
@endsection
