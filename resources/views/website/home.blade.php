@extends('layouts.website.index')

@section('title', 'User Account')

@section('styles')
    <style>
        .grow {
            transition: all .2s ease-in-out;
        }

        .grow:hover,
        .grow:focus {
            transform: scale(1.02);
        }

        .channel-card:hover,
        .channel-card:focus {
            border-color: rgba(255, 175, 2);
            /* border: red groove ; */
            box-shadow: 0 0px 7px rgba(248, 221, 164);
            /* box-shadow: 0 0px 12px rgba(205, 200, 185, 0.09); */
            cursor: pointer;
            text-decoration: none;
            background-color: rgba(255, 243, 134, 0.162);
            /* border:1px solid gray */
        }

        a.channel-card-link {
            text-decoration: none;
            color: black;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #343a40;
        }

    </style>

    {{-- <style>
        .channel-card {
            min-width: 340px;
            max-width: 340px;
            /* margin: 0 auto; */
            /* Added */
            float: none;
            /* Added */
            /* Added */
        }


        .chnl-card {
            border-radius: 1.25rem;
            overflow: hidden;

            min-width: 220px;
            max-width: 220px;
            height: 250px;
            margin-left: 10px;

        }

        .chnl-card .card-footer {
            background-color: #3f3f3f;
        }

        .chnl-card .description-block .description-header,
        .description-text {
            color: #f7ffda;
        }

        .widget-user .widget-user-image > img{
            border: 2px solid #ccc;
            /* width: 55px; */
        }

    </style> --}}
@endsection

@section('navbar')
    @include('website.navbar')
@endsection




@section('content')



    {{-- <div class="row"> --}}
    {{-- <div class="d-flex justify-content-center"> --}}

    <div class="container mb-4">
        <div class="row mt-4">
            <div class="col">
                <h2 class="mb-4">{{ __('Welcome, ') . ' ' . auth()->user()->name }}.</h2>
            </div>
        </div>
        <div class="grid-container">
            <div class="justify-content-center ">

                @hasanyrole('member-user' )
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">

                                    <!-- Profile Image -->
                                    <div class="card card-dark card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="{{ auth()->user()->profile_photo_url }}" alt="User profile picture">
                                            </div>

                                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                                            <p class="text-muted text-center">
                                                @php

                                                    $user_role_names = auth()
                                                        ->user()
                                                        ->getRoleNames();
                                                    $display_role = '';
                                                    if (
                                                        auth()
                                                            ->user()
                                                            ->hasRole('super-admin')
                                                    ) {
                                                        $display_role = 'Super-Admin';
                                                    } else {
                                                        if (
                                                            auth()
                                                                ->user()
                                                                ->hasRole('system-manager')
                                                        ) {
                                                            $display_role .= 'System-manager ';
                                                        }
                                                        if (
                                                            auth()
                                                                ->user()
                                                                ->hasRole('finance-admin')
                                                        ) {
                                                            $display_role .= 'Finance-Admin ';
                                                        }
                                                        if (
                                                            auth()
                                                                ->user()
                                                                ->hasRole('membership-admin')
                                                        ) {
                                                            $display_role .= 'Membership-Admin ';
                                                        }
                                                    }

                                                @endphp
                                                {{ $display_role }}
                                                <p class="text-center">
                                                <span class="badge badge-info">Founder</span>
                                                        <span class="badge badge-dark">Memakert</span>
                                                </p>
                                            </p>

                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Member Since</b> <a class="float-right">Jul 12, 2021</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Department</b> <a class="float-right">
                                                        <span class="badge badge-secondary">Department 1</span>
                                                        <span class="badge badge-secondary">Department 2</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            {{-- <a href="#" class="btn btn-dark btn-block"><i class="fa fa-edit"></i> <b>Edit</b></a> --}}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                    <!-- About Me Box -->
                                    <div class="card card-dark">
                                        <div class="card-header">
                                            <h3 class="card-title">About Me</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                            <p class="text-muted">
                                                B.S. in Computer Science.
                                            </p>

                                            <hr>

                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                            <p class="text-muted">Addis Ababa, Ethiopia</p>

                                            <hr>

                                            <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>

                                            <p class="text-muted">0911111111</p>

                                            <hr>

                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                            <p class="text-muted">
                                                <span class="badge badge-danger">Software Programming</span>
                                                <span class="badge badge-success">Piano Playing</span>
                                                <span class="badge badge-info">Plumbing</span>
                                                <span class="badge badge-warning">Architerue Design</span>
                                                <span class="badge badge-dark">Video Editing</span>
                                            </p>

                                            <hr>

                                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Etiam fermentum enim neque.</p>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#home"
                                                        data-toggle="tab">Home</a></li>
                                                <li class="nav-item"><a class="nav-link " href="#payment"
                                                    data-toggle="tab">Payment History</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#compliant"
                                                        data-toggle="tab">Compliant</a></li>
                                            </ul>
                                        </div><!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="home">
                                                    Member's Home...
                                                    <p class="text-muted">Specific posts made by departments or General Posts made by Maseb Manager will be displayed here.</p>
                                                </div>

                                                <div class="tab-pane" id="messages">
                                                    <!-- Post -->
                                                    <div class="post">
                                                        <div class="user-block">
                                                            <img class="img-circle img-bordered-sm"
                                                                src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                            <span class="username">
                                                                <a href="#">Jonathan Burke Jr.</a>
                                                                <a href="#" class="float-right btn-tool"><i
                                                                        class="fas fa-times"></i></a>
                                                            </span>
                                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                                        </div>
                                                        <!-- /.user-block -->
                                                        <p>
                                                            Lorem ipsum represents a long-held tradition for designers,
                                                            typographers and the like. Some people hate it and argue for
                                                            its demise, but others ignore the hate as they create awesome
                                                            tools to help create filler text for everyone from bacon lovers
                                                            to Charlie Sheen fans.
                                                        </p>

                                                        <p>
                                                            <a href="#" class="link-black text-sm mr-2"><i
                                                                    class="fas fa-share mr-1"></i> Share</a>
                                                            <a href="#" class="link-black text-sm"><i
                                                                    class="far fa-thumbs-up mr-1"></i> Like</a>
                                                            <span class="float-right">
                                                                <a href="#" class="link-black text-sm">
                                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                                </a>
                                                            </span>
                                                        </p>

                                                        <input class="form-control form-control-sm" type="text"
                                                            placeholder="Type a comment">
                                                    </div>
                                                    <!-- /.post -->

                                                    <!-- Post -->
                                                    <div class="post clearfix">
                                                        <div class="user-block">
                                                            <img class="img-circle img-bordered-sm"
                                                                src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                                            <span class="username">
                                                                <a href="#">Sarah Ross</a>
                                                                <a href="#" class="float-right btn-tool"><i
                                                                        class="fas fa-times"></i></a>
                                                            </span>
                                                            <span class="description">Sent you a message - 3 days ago</span>
                                                        </div>
                                                        <!-- /.user-block -->
                                                        <p>
                                                            Lorem ipsum represents a long-held tradition for designers,
                                                            typographers and the like. Some people hate it and argue for
                                                            its demise, but others ignore the hate as they create awesome
                                                            tools to help create filler text for everyone from bacon lovers
                                                            to Charlie Sheen fans.
                                                        </p>

                                                        <form class="form-horizontal">
                                                            <div class="input-group input-group-sm mb-0">
                                                                <input class="form-control form-control-sm"
                                                                    placeholder="Response">
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.post -->

                                                    <!-- Post -->
                                                    <div class="post">
                                                        <div class="user-block">
                                                            <img class="img-circle img-bordered-sm"
                                                                src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                                            <span class="username">
                                                                <a href="#">Adam Jones</a>
                                                                <a href="#" class="float-right btn-tool"><i
                                                                        class="fas fa-times"></i></a>
                                                            </span>
                                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                                        </div>
                                                        <!-- /.user-block -->
                                                        <div class="row mb-3">
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid" src="../../dist/img/photo1.png"
                                                                    alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-sm-6">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <img class="img-fluid mb-3"
                                                                            src="../../dist/img/photo2.png" alt="Photo">
                                                                        <img class="img-fluid"
                                                                            src="../../dist/img/photo3.jpg" alt="Photo">
                                                                    </div>
                                                                    <!-- /.col -->
                                                                    <div class="col-sm-6">
                                                                        <img class="img-fluid mb-3"
                                                                            src="../../dist/img/photo4.jpg" alt="Photo">
                                                                        <img class="img-fluid"
                                                                            src="../../dist/img/photo1.png" alt="Photo">
                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>
                                                                <!-- /.row -->
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->

                                                        <p>
                                                            <a href="#" class="link-black text-sm mr-2"><i
                                                                    class="fas fa-share mr-1"></i> Share</a>
                                                            <a href="#" class="link-black text-sm"><i
                                                                    class="far fa-thumbs-up mr-1"></i> Like</a>
                                                            <span class="float-right">
                                                                <a href="#" class="link-black text-sm">
                                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                                </a>
                                                            </span>
                                                        </p>

                                                        <input class="form-control form-control-sm" type="text"
                                                            placeholder="Type a comment">
                                                    </div>
                                                    <!-- /.post -->
                                                </div>

                                                <div class="tab-pane" id="payment">
                                                    Payment History...
                                                </div>

                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="timeline">
                                                    <!-- The timeline -->
                                                    <div class="timeline timeline-inverse">
                                                        <!-- timeline time label -->
                                                        <div class="time-label">
                                                            <span class="bg-danger">
                                                                10 Feb. 2014
                                                            </span>
                                                        </div>
                                                        <!-- /.timeline-label -->
                                                        <!-- timeline item -->
                                                        <div>
                                                            <i class="fas fa-envelope bg-dark"></i>

                                                            <div class="timeline-item">
                                                                <span class="time"><i class="far fa-clock"></i>
                                                                    12:05</span>

                                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent
                                                                    you an email</h3>

                                                                <div class="timeline-body">
                                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy
                                                                    zoodles,
                                                                    weebly ning heekya handango imeem plugg dopplr jibjab,
                                                                    movity
                                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                                                    kaboodle
                                                                    quora plaxo ideeli hulu weebly balihoo...
                                                                </div>
                                                                <div class="timeline-footer">
                                                                    <a href="#" class="btn btn-dark btn-sm">Read more</a>
                                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END timeline item -->
                                                        <!-- timeline item -->
                                                        <div>
                                                            <i class="fas fa-user bg-info"></i>

                                                            <div class="timeline-item">
                                                                <span class="time"><i class="far fa-clock"></i> 5
                                                                    mins ago</span>

                                                                <h3 class="timeline-header border-0"><a href="#">Sarah
                                                                        Young</a> accepted your friend request
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <!-- END timeline item -->
                                                        <!-- timeline item -->
                                                        <div>
                                                            <i class="fas fa-comments bg-warning"></i>

                                                            <div class="timeline-item">
                                                                <span class="time"><i class="far fa-clock"></i> 27
                                                                    mins ago</span>

                                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented
                                                                    on your post</h3>

                                                                <div class="timeline-body">
                                                                    Take me to your leader!
                                                                    Switzerland is small and neutral!
                                                                    We are more like Germany, ambitious and misunderstood!
                                                                </div>
                                                                <div class="timeline-footer">
                                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                                        comment</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END timeline item -->
                                                        <!-- timeline time label -->
                                                        <div class="time-label">
                                                            <span class="bg-success">
                                                                3 Jan. 2014
                                                            </span>
                                                        </div>
                                                        <!-- /.timeline-label -->
                                                        <!-- timeline item -->
                                                        <div>
                                                            <i class="fas fa-camera bg-purple"></i>

                                                            <div class="timeline-item">
                                                                <span class="time"><i class="far fa-clock"></i> 2
                                                                    days ago</span>

                                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded
                                                                    new photos</h3>

                                                                <div class="timeline-body">
                                                                    <img src="https://placehold.it/150x100" alt="...">
                                                                    <img src="https://placehold.it/150x100" alt="...">
                                                                    <img src="https://placehold.it/150x100" alt="...">
                                                                    <img src="https://placehold.it/150x100" alt="...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END timeline item -->
                                                        <div>
                                                            <i class="far fa-clock bg-gray"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.tab-pane -->

                                                <div class="tab-pane" id="compliant">
                                                    <form class="form-horizontal">
                                                        <div class="form-group row">
                                                            <label for="inputName" class="col-sm-2 col-form-label">Topic</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" id="inputName"
                                                                    placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">

                                                            <label class="col-sm-2 col-form-label">For</label>
                                                            <div class="col-sm-10">

                                                                <select class="form-control">
                                                                <option selected>Choose...</option>
                                                                <option>Mahbere Sebawiyan Board</option>
                                                                <option>Membership Admin</option>
                                                                <option>Finance Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Message Type</label>

                                                            <div class="form-check ml-2">
                                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                  Message
                                                                </label>
                                                              </div>
                                                              <div class="form-check ml-4">
                                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                <label class="form-check-label" for="exampleRadios2">
                                                                  Compliant
                                                                </label>
                                                              </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Message</label>
                                                            <textarea class="form-control" rows="3" placeholder="Enter Message ..."></textarea>
                                                          </div>

                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit" class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                @else
                <div class="alert alert-warning" role="alert">
                    Sorry, You are not permitted to view your membership profile.
                  </div>
                @endhasrole
            </div>
        </div>
    </div>

    {{-- </div> --}}
    {{-- </div> --}}


@endsection

@section('js')


    <script>
        // $(function () {alert('here')});
        $(document).ready(function(e) {
            // window.Echo.private('App.Models.User.' + {{ auth()->user()->id }})
            // .notification((notification) => {
            //     console.log(notification, "New user notification.");
            // });
            // window.Echo.join(`chat`)
            //     .here((users) => {
            //         alert("hsers");
            //     })
            //     .joining((user) => {
            //         console.log(user.name);
            //     })
            //     .leaving((user) => {
            //         console.log(user.name);
            //     })
            //     .error((error) => {
            //         console.error(error);
            //     });
        });
    </script>
@endsection
