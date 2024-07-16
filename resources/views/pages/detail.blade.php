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
                            <h1>{{ $items->title }}</h1>
                            <p>{{ $items->location }}</p>
                     
                            @if ($items->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($items->galleries->first()->image) }}" alt="" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($items->galleries->first()->image) }}">
                                </div>
                                <div class="xzoom-thumbs ">
                                    @foreach ($items->galleries as $gallery)
                                    <a href="{{ Storage::url($gallery->image) }}"><img src="{{ Storage::url($gallery->image) }}" alt="" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image) }}">
                                    </a>
                                    @endforeach
                                </div>
                         
                            </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                            <p>
                                {!! $items->about !!}
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="{{ url('frontend/images/ic_event@2x.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Featured Event</h3>
                                        <p>{{ $items->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/ic_bahasa@2x.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $items->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/ic_foods@2x.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $items->foods }}</p>
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
                                   {{ \Carbon\Carbon::create($items->departured_date)->format('F n, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Duration</th>
                                <td width="50%" class="text-end">
                                    {{ $items->duration }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Type</th>
                                <td width="50%" class="text-end">
                                   {{ $items->type }}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Price</th>
                                <td width="50%" class="text-end">
                                  {{ $items->price }},00 / person
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                       @auth
                           <form action="" method="POST">
                            <button class="btn btn-block btn-join-now mt-5 py-2 w-100 rounded-top-0" type="submit">Join Now</button>
                           </form>
                       @endauth
                       @guest
                       <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-5 py-2 w-100 rounded-top-0">Login or Register to Join</a>
                       @endguest
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