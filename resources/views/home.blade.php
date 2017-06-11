@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <h1>Get Yor Voucher</h1>
                <p>Generate and get your voucher. You can use voucher to get discount when you want to buy a car.</p>
                <p><a href="{{ route('voucher.index') }}">Let's get your voucher</a></p>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
