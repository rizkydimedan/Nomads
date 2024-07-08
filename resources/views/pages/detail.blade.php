@extends('layouts.homepage')
@section('title', 'Detail Travel')


@section('content')
     <!-- main -->
     <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item ">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active" >
                                    Details
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>Nusa Penida</h1>
                            <p>Republik of Indonesia Raya</p>
                     
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="frontend/images/details-1@2x.jpg" alt="" class="xzoom" id="xzoom-default" xoriginal="frontend/images/details-1@2x.jpg">
                            </div>
                            <div class="xzoom-thumbs ">
                                <a href="frontend/images/header-background@2x.jpg"><img src="frontend/images/header-background@2x.jpg" alt="" class="xzoom-gallery" width="128" xpreview="frontend/images/header-background@2x.jpg">
                                </a>
                                <a href="frontend/images/details-1@2x.jpg"><img src="frontend/images/details-1@2x.jpg" alt="" class="xzoom-gallery" width="128" xpreview="frontend/images/details-1@2x.jpg">
                                </a>
                                <a href="frontend/images/details-1@2x.jpg"><img src="frontend/images/details-1@2x.jpg" alt="" class="xzoom-gallery" width="128" xpreview="frontend/images/details-1@2x.jpg">
                                </a>
                                <a href="frontend/images/details-1@2x.jpg"><img src="frontend/images/details-1@2x.jpg" alt="" class="xzoom-gallery" width="128" xpreview="frontend/images/details-1@2x.jpg">
                                </a>
                                <a href="frontend/images/details-1@2x.jpg"><img src="frontend/images/details-1@2x.jpg" alt="" class="xzoom-gallery" width="128" xpreview="frontend/images/details-1@2x.jpg">
                                </a>
                            </div>
                     
                        </div>
                            <h2>Tentang Wisata</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis eum ipsam, numquam
                                est minus velit placeat dolores ex facere, fugit commodi enim saepe optio quas
                                perspiciatis, laboriosam perferendis sit id!
                            </p>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="frontend/images/ic_event@2x.png" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Featured Event</h3>
                                        <p>Tari Kecak</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="frontend/images/ic_bahasa@2x.png" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>Bahasa Indonesia</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="frontend/images/ic_foods@2x.png" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>Local Foods</p>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right rounded-bottom-0">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <img src="/frontend/images/avatar-3.png" alt="" class="member-image mr-1">
                            <img src="/frontend/images/avatar-3.png" alt="" class="member-image mr-1">
                            <img src="/frontend/images/avatar-2.png" alt="" class="member-image mr-1">
                            <img src="/frontend/images/avatar-3.png" alt="" class="member-image mr-1">
                            <img src="/frontend/images/avatar-2.png" alt="" class="member-image mr-1">


                        </div>
                        <hr>
                        <h2>Trip Information</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Date of Departure</th>
                                <td width="50%" class="text-end">
                                    22 Aug. 2024
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-end">
                                    4D 3N
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-end">
                                   Open Trip
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-end">
                                  $80.00 / person
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout') }}" class="btn btn-block btn-join-now mt-5 py-2 w-100 rounded-top-0">Join Now</a>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
   $(document).ready(function () {
    $('.xzoom, .xzoom-gallery').xzoom({
        zoomWidth: 500,
        title: false,
        tint: '#333',
        x0ffset: 15
    });
   });
</script>
@endpush