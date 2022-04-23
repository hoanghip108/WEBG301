@extends('UserView.UserMaster.UserMaster')
@section('css')
    <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/responsive.bootstrap4.css')}}">
@endsection

@section('main')
@include('UserView.Partial.navbar')
@include('UserView.Partial.leftnav');
    <div class="container-fluid mm-active">
        <div class="wrapper mm-show">
            {{--            @include('UserView.Partial.leftnav')--}}
            <div class="content-page">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12" >
{{--                            <div class="card" >--}}
                                <div id="carouselExampleControls" class="carousel slide "
                                     data-ride="carousel" style="height: 500px">
                                    <div class="carousel-inner" role="listbox" style="height: 500px; width: 100%">
                                        <div class="carousel-item active">
                                            <img class="d-block img-fluid mx-auto"
                                                 src="{{asset('/images/puppy_images/blue.jpg')}}" alt="First slide" >
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid mx-auto"
                                                 src="{{asset('/images/puppy_images/Bonita.jpg')}}" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid mx-auto"
                                                 src="{{asset('/images/puppy_images/chico.jpg')}}" alt="Third slide">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                       data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
{{--                                <div class="card-body" >--}}
{{--                                --}}
{{--                                    --}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                        @foreach($pets as $each)
                            <div class="col-md-6 col-xl-3" style="margin-top:30px">
                                <!-- project card -->

                                <div class="card d-block" style="width: 330px; height: 350px; margin: 50px 50px">
                                    <!-- project-thumbnail -->
                                    <img class="card-img-top" src="{{$each->image}}"
                                         alt="project image cap" style="height: 100%; width:100%">

                                    <div class="card-body position-relative">
                                        <!-- project title-->
                                        <h4 class="mt-0">
                                            <a href="{{Route('Pet.Detail',['id'=>$each->Pid])}}" class="text-title">{{$each->name}}</a>
                                        </h4>

                                        <!-- project detail-->
                                        <p class="mb-3">
                                            <span class="pr-2 text-nowrap">
                                                <i class=" dripicons-star"></i>
                                                <b>{{$each->bread}}</b>
                                            </span>
                                            <span class="text-nowrap">
                                                <i class="uil-home"></i>
                                                <b>{{$each->area}}</b>
                                            </span>
                                            <span class="text-nowrap">
                                                <i class="uil-meh-alt"></i>
                                                <b>{{$each->color}}</b>
                                            </span>
                                        </p>

                                        <!-- project progress-->
                                        <p class="mb-2 font-weight-bold">Most people like <span class="float-right">45%</span>
                                        </p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="45"
                                                 aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                            </div><!-- /.progress-bar -->
                                        </div><!-- /.progress -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                    @endforeach<!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--<section id="aboutsection" class="About-custom">--}}
{{--    <div>--}}
{{--        <h2 style="font-size: 2rem;">About Us</h2>--}}
{{--    </div>--}}
{{--    <br />--}}
{{--    <div style="text-align: center;">--}}
{{--        <h2 style="font-size: 2rem;">PECA Puppy</h2>--}}
{{--        <h4>Do Nguyen Huy Hoang and Nguyen Trong Dat</h4>--}}
{{--    </div>--}}
{{--    <div class="row" style="text-align: center; padding-top: 30px">--}}
{{--        <div class="col-lg-4">--}}
{{--            <i class="fas fa-address-card" style="font-size: 50px;"></i>--}}
{{--            <h4>Do Nguyen Huy Hoang and Nguyen Trong Dat</h4>--}}
{{--            <br>--}}
{{--            <p>2 Founder of PECA puppy shop with the mission loving pets.</p>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4">--}}
{{--            <i class="fas fa-building" style="font-size: 50px;"></i>--}}
{{--            <h4>Shop</h4>--}}
{{--            <br>--}}
{{--            <p>PECA has 3 locations nationwide. Ready to serve you at any time.</p>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4">--}}
{{--            <i class="fas fa-phone" style="font-size: 50px;"></i>--}}
{{--            <h4>Support</h4>--}}
{{--            <br>--}}
{{--            <p>Telephone: 0123456789</p>--}}
{{--            <p>Address: Hanoi-Vietnam</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section id="addresssection" class="Address-custom">--}}
{{--    <div>--}}
{{--        <h2 style="font-size: 2rem;">Address</h2>--}}
{{--    </div>--}}
{{--    <br />--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-6 left-custom" style="padding: 40px;">--}}
{{--            <h3>PECA</h3>--}}
{{--            <p>--}}
{{--                With its own efforts, PECA has built a staff with a professional working style,--}}
{{--                dedicated to customers. Besides, the company is also continuing to build a modern online business center--}}
{{--                so that customers can find the PECA brand quickly online.--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6 right-custom">--}}
{{--            <img src="{{asset('/images/peca-04.png')}}" alt="Address" style="width: 100%" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <br />--}}
{{--    <div>--}}
{{--        <div class="card-group" style="text-align: center;">--}}
{{--            <div class="card custom-card" style="background-color: blanchedalmond;">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">PECA</h5>--}}
{{--                    <p class="card-text"><i class="fas fa-map-marker-alt"></i>--}}
{{--                        123 Ho Tung Mau</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card custom-card" style="background-color: blanchedalmond;">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">PECA</h5>--}}
{{--                    <p class="card-text"><i class="fas fa-map-marker-alt"></i>--}}
{{--                        68 Cau Giay</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card custom-card" style="background-color: blanchedalmond;">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">PECA</h5>--}}
{{--                    <p class="card-text"><i class="fas fa-map-marker-alt"></i>--}}
{{--                        76 Xuan Thuy</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

    @include('UserView.Partial.footer')
@endsection
