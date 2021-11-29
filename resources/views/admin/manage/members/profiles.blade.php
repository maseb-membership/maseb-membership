@extends('layouts.admin.index')

@section('page_title', 'Batch')

@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('vendors/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('vendors/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

<link rel="stylesheet"
    href="{{ asset('vendors/admin/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css') }}">
<style>
    th,
    td {
        white-space: nowrap;
    }

    div.dataTables_wrapper {
        /* width: 800px; */
        margin: 0 auto;
    }

</style>
@endsection

@section('header_title')
Members Management
@stop

{{-- @section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Admin</a></li>
<li class="breadcrumb-item active">Addmes - Batches</li>
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
    {{-- <div class="col-sm-3  order-sm-2"> --}}

    {{-- @include('admin.manage.batches.sidebar') --}}

    {{-- </div> --}}
    <div class="col-sm-12  order-sm-1">
        <div class="card card-solid">
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user2-160x160.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user2-160x160.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user1-128x128.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Digital Strategist
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('vendors/admin/dist/img/user2-160x160.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                          <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item"><a class="page-link" href="#">6</a></li>
                  <li class="page-item"><a class="page-link" href="#">7</a></li>
                  <li class="page-item"><a class="page-link" href="#">8</a></li>
                </ul>
              </nav>
            </div>
            <!-- /.card-footer -->
          </div>

    </div>
</div>


@endsection


@section('modals')

<!-- Add New Modal -->
{{-- @include('admin.manage.batches.create_modal') --}}

<!-- Edit Modal -->
{{-- @include('admin.manage.batches.edit_modal') --}}

@endsection


@section('js')

<!-- DataTables  & Plugins -->
<script src="{{ asset('vendors/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
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



@endsection
