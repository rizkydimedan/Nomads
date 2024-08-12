@extends('layouts.checkout')
@section('title', 'Checkout')

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
                                <li class="breadcrumb-item">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Chekcout
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Who is going ?</h1>
                            <p>Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @forelse ($item->details as $detail )
                                        <tr>
                                            <td><img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle"></td>
                                            <td class="align-middle">
                                                {{ $detail->username }}
                                            </td>
                                            <td class="align-middle">{{ $detail->nationality }}</td>
                                            <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                            <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}</td>
                                            <td class="align-middle">
                                              
                                                    <a href="{{ route('checkout_remove', $detail->id) }}" >
                                                        <img src="{{ url('frontend/images/ic_remove.png') }}" alt="">
                                                    </a>
                                              
                                               
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Visitor</td>
                                            </tr>
                                        @endforelse
                                      
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="{{ route('checkout_create', $item->id) }}" method="POST" class="row align-items-center justify-content-start">
                                    @csrf

                                    <div class="col-md-6 col-lg-3 d-flex">
                                        <!-- <label for="inputUsername" class="invisible" >Name</label> -->
                                        <input type="text" class="form-control mb-2 me-sm-2" id="username"
                                            placeholder="Username" name="username" >

                                           
                                    </div>

                                    <input type="text" class="form-control mb-2" id="nationality"
                                    placeholder="Nationality" name="nationality" 
                                 style="width: 50px">
                            
                                    <div class="col-lg-2 col-md-6">
                                        <!-- <label for="inputVisa" class="invisible">Visa</label> -->
                                        <select name="is_visa" id="is_visa"
                                            class="custom-select mb-2 me-sm-2 form-select">
                                            <option value="VISA" selected>VISA</option>
                                            <option value="1">30 DAYS</option>
                                            <option value="0">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <!-- <label for="doePassport" class="invisible">DOE Passport</label> -->
                                        <div class="input-group mb-2 me-sm-2">
                                            <input type="text" class="form-control datepicker"  id="doe_passport" name="doe_passport"
                                                placeholder="DOE Passport">

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">

                                        <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                    </div>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    You are only able to invite member that has registered in Nomads
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right rounded-bottom-0 ">
                            <h2 class="fw-bold">Checkout Information</h2>
                            <table class="trip-information  ">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-end">
                                        {{ $item->details->count() }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional Visa</th>
                                    <td width="50%" class="text-end">
                                        $ {{ $item->additional_visa }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-end">
                                        $ {{ $item->travel_package->price }},00 / person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Subtotal</th>
                                    <td width="50%" class="text-end">
                                        $ {{ $item->additional_total }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique Code)</th>
                                    <td width="50%" class="text-end text-total">
                                        <span class="text-blue">$ {{ $item->additional_total }},</span>
                                        <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2>Payment Instructions</h2>
                            <p class="payment-instruction">Please complete yout payment before to continue the wonderful
                                trip</p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="frontend/images/ic_bank.png" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads</h3>
                                        <p>06450978096
                                            <br>
                                            Bank Central
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="frontend/images/ic_bank.png" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads</h3>
                                        <p>549954435
                                            <br>
                                            Bank HSBC
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{ route('checkout_success', $item->id) }}" class="btn btn-block btn-join-now mt-5 py-2 w-100 rounded-top-0">I Have Made
                                Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $item->travel_package->slug )}}" class="text-muted text-decoration-none">
                                Cancel Booking
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main -->
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
></script>
<script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
<script>

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        // uiLibrary: 'bootstrap5',
    });
</script>
@endpush