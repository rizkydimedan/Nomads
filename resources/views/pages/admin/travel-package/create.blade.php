@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif


        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('travel-package.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input class="form-control" type="text" name="location" placeholder="location"
                            value="{{ old('location') }}">
                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="" cols="30" rows="10" class="d-block w-100 form-control">{{ old('about') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="featured_event">Featured Event</label>
                        <input class="form-control" type="text" name="featured_event" placeholder="Featured Event"
                            value="{{ old('featured_event') }}">
                    </div>

                    <div class="form-group">
                        <label for="language">Language</label>
                        <input class="form-control" type="text" name="language" placeholder="Language"
                            value="{{ old('language') }}">
                    </div>

                    <div class="form-group">
                        <label for="foods">Foods</label>
                        <input class="form-control" type="text" name="foods" placeholder="Foods"
                            value="{{ old('foods') }}">
                    </div>

                    <div class="form-group">
                        <label for="departure_date">Departure Date</label>
                        <input class="form-control" type="date" name="departured_date" placeholder="Departure Date"
                            value="{{ old('departure_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input class="form-control" type="text" name="duration" placeholder="Duration"
                            value="{{ old('duration') }}">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input class="form-control" type="text" name="type" placeholder="Type"
                            value="{{ old('type') }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="number" name="price" placeholder="Price"
                            value="{{ old('price') }}">
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
