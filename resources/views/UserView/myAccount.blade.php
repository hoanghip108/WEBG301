@extends('toywebsiteMaster.ToyMaster')
@section('css')
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/responsive.bootstrap4.css')}}">
@endsection


@section('main')
<div class="navbar-custom topnav-navbar topnav-navbar-dark" style="position: sticky">

    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{Route('user.view')}}" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="{{asset('images/pecaden.png')}}" alt="logo" height="40px">
                                </span>
            <span class="topnav-logo-sm">
                                    <img src="{{asset('images/pecaden.png')}}" alt="" height="40px">
                                </span>
        </a>
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list d-lg-none show">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="true">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0 show"
                     style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 70px, 0px);"
                     x-placement="bottom-start">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..."
                               aria-label="Recipient's username" name="product_name">
                    </form>
                </div>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                   href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <!-- <span class="account-user-avatar">
                                            <img src="{{asset('images/me.jpg')}}" alt="user-image"
                                                 class="rounded-circle">
                                        </span> -->

                    <span class="account-user-name">
                                                {{\Illuminate\Support\Facades\Session::has('clientUsername')?
                        \Illuminate\Support\Facades\Session::get('clientUsername') : 'Unknow user'}}
                                            <span class="account-position">Unknow user</span>
                                        </span>
                </a>
                <div
                        class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                        aria-labelledby="topbar-userdrop" style="">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('client.my-account', Session::get('clientUsername') )}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle mr-1"></i>
                        <span>My Account</span>
                    </a>
                    <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout mr-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list d-lg-none show">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="true">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0 show"
                     style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(10px, 70px, 0px);"
                     x-placement="bottom-start">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..."
                               aria-label="Recipient's username" name="product_name">
                    </form>
                </div>
            </li>
{{--            <a href="{{Route('user.register')}}" class="btn mb-2 bg-dark"--}}
{{--               style="border-radius: 15px; color: white; border-color: white;margin-top: 15px"><i--}}
{{--                    class="mdi mdi-plus-circle mr-2"></i> Register--}}
{{--            </a>--}}
        </ul>
        <div class="app-search dropdown">
            <form action="{{route('user.FindProductByName')}}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." id="top-search"
                           style="border-radius: 15px; margin-right: 15px" name="product_name">
                    <span class="mdi mdi-magnify search-icon"></span>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="border-radius: 15px">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list topbar-dropdown">
                <a href="{{route('user.aboutus')}}" class="nav-link " role="button" style="font-size: 17px; margin: 0 15px"><i class="dripicons-location"></i> About Us</a>
            </li>
            <li class="dropdown notification-list topbar-dropdown">
                <a href="{{route('user.tip')}}" class="nav-link dropdown-toggle arrow-none" role="button" style="font-size: 17px; margin: 0 15px"><i class=" mdi mdi-bookshelf"></i> Tips</a>
            </li>
            <li class="dropdown notification-list topbar-dropdown">
                <a href="{{route('user.gallery')}}" class="nav-link dropdown-toggle arrow-none"
                   role="button" style="font-size: 17px; margin: 0 15px"><i class="mdi mdi-dog"></i> Gallery</a>
            </li>
            <li class="dropdown notification-list topbar-dropdown">
                <a href="{{route('user.register')}}" class="nav-link dropdown-toggle arrow-none"
                   role="button" style="font-size: 17px; margin: 0 15px"><i class=" mdi mdi-registered-trademark"></i> Register</a>
            </li>
        </ul>

    </div>
</div>





    <div class="container-fluid">
        <div class="content-page" style="padding: 0 20px 100px 20px">
            <h1>My Account</h1>
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{$user[0]->Cid}}</dd>

                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{$user[0]->customer_name}}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{$user[0]->email}}</dd>

                <dt class="col-sm-3">Phone</dt>
                <dd class="col-sm-9">{{$user[0]->address}}</dd>

                <dt class="col-sm-3">Gender</dt>
                <dd class="col-sm-9">{{$user[0]->gender}}</dd>

                <dt class="col-sm-3">Username</dt>
                <dd class="col-sm-9">{{$user[0]->username}}</dd>

            </dl>
{{--            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#login-modal">Update</button>--}}
{{--            <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--                <div class="modal-dialog">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-body">--}}
{{--                            <form action="{{Route('admin.verify'),Session::get('username')}}" class="pl-3 pr-3" method="post">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="password1">Password</label>--}}
{{--                                    <input class="form-control" type="password" required="" id="password1" placeholder="Enter your password" name="pwd">--}}
{{--                                </div>--}}
{{--                                <div class="form-group text-center">--}}
{{--                                    <button class="btn btn-rounded btn-primary" type="submit">Submit</button>--}}
{{--                                </div>--}}

{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </div><!-- /.modal-content -->--}}
{{--                </div><!-- /.modal-dialog -->--}}
{{--            </div><!-- /.modal -->--}}
            <a href="{{route('admin.edit', Session::get('username') )}}" class="btn btn-danger mb-2"
               style="border-radius: 15px; background-color: #0eac5c; border-color: #0eac5c">Edit <i class="mdi mdi-pencil"></i> </a>
@endsection
