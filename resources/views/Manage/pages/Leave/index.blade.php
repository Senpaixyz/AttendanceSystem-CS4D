@extends('Manage.layouts.app')

@section('content')
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
    <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <!-- Table -->
                    <div class=" bg-white">
                        <!-- Card header -->
                        <div class="card-header border-0 bg-white">
                            <h3 class="mb-0 text-smcl-blue">Leave Request</h3>
                        </div>
                        <!-- Light table -->
                        <div class="card-body">
                            <form action="" id="form">
                            <div class="row">
                                <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-control-label" for="subject">Select Leave Type</label>
                                            <select id="subject" name="subject_filter" class="form-control radius search">
                                                <option value="">Annual Leave</option>
                                                <option value="">Sick Leave</option>
                                                <option value="">Vacation Leave</option>
                                                <option value="">Maternity Leave</option>
                                                <option value="">Emergency Leave</option>
                                                <option value="">Other</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-date">Choose Date</label>
                                            <input class="form-control search datepicker" name="date_filter" value="" id="input-date" placeholder="Start Date" type="text" style="width: 30%;">
                                            <h4>to</h4>
                                            <input class="form-control search datepicker" name="date_filter" value="" id="input-date" placeholder="End Date" type="text" style="width: 30%;">
                                        </div>
                                        <hr>
                                        <div class="row mx-3">                       
                                        <button class="btn bg-smcl-red text-light btn-lg btn-block radius" style="width:30%;">Submit</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--/ Table -->
                </div>
            </div>
        </div>
        
    </div>
@endsection
