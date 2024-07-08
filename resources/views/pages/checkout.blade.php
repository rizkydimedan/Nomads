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
                            <h1>Who is going ?</h1>
                            <p>Trip to Ubud, Bali, Indonesia</p>
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
                                        <tr>
                                            <td><img src="frontend/images/avatar-2.png" height="60"></td>
                                            <td class="align-middle">
                                                Hana
                                            </td>
                                            <td class="align-middle">Fr</td>
                                            <td class="align-middle">N/A</td>
                                            <td class="align-middle">Active</td>
                                            <td class="align-middle">
                                                <img src="frontend/images/ic_remove.png" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="frontend/images/avatar-3.png" height="60"></td>
                                            <td class="align-middle">
                                                Miku
                                            </td>
                                            <td class="align-middle">ENG</td>
                                            <td class="align-middle">N/A</td>
                                            <td class="align-middle">Active</td>
                                            <td class="align-middle">
                                                <img src="frontend/images/ic_remove.png" alt="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="#" method="post" class="row align-items-center justify-content-start">
                                    <div class="col-md-6 col-lg-3">
                                        <!-- <label for="inputUsername" class="invisible" >Name</label> -->
                                        <input type="text" class="form-control mb-2 me-sm-2" id="inputUsername"
                                            placeholder="Username" name="inputUsername">
                                    </div>
                                    <div class="col-lg-2 col-md-6">
                                        <!-- <label for="inputVisa" class="invisible">Visa</label> -->
                                        <select name="inputVisa" id="inputVisa"
                                            class="custom-select mb-2 me-sm-2 form-select">
                                            <option value="VISA" selected>VISA</option>
                                            <option value="30 DAYS">30 DAYS</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <!-- <label for="doePassport" class="invisible">DOE Passport</label> -->
                                        <div class="input-group mb-2 me-sm-2">
                                            <input type="text" class="form-control datepicker" id="doePassport"
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
                                        2 person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional Visa</th>
                                    <td width="50%" class="text-end">
                                        $190,00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-end">
                                        $ 80,00 / person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Subtotal</th>
                                    <td width="50%" class="text-end">
                                        $ 280,00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique Code)</th>
                                    <td width="50%" class="text-end text-total">
                                        <span class="text-blue">$ 279,</span>
                                        <span class="text-orange">33</span>
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
                            <a href="{{ route('checkout-success') }}" class="btn btn-block btn-join-now mt-5 py-2 w-100 rounded-top-0">I Have Made
                                Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail') }}" class="text-muted text-decoration-none">
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
        uiLibrary: 'bootstrap5',
    });
</script>
@endpush