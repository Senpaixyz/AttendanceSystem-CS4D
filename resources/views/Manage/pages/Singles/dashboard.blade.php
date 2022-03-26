@extends('Manage.layouts.app')

@section('content')
    <div class="main-content " id="panel">
    @include('Manage.includes.header')
        <!-- Header -->
        <div class="header bg-primary pb-6">
                <div class="container-fluid">
                    <div class="header-body ">
                        <div class="row">
                            <div class="col-6 mt-4 text-left text-light">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card card-stats radius shadow-2xl bg-gradient-default">
                                                    <!-- Card body -->
                                                    <div class="card-body radius shadow-2xl">
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="">
                                                                    <h4 class="card-title text-uppercase text-muted mb-0">YOUR STUDENTS</h4>
                                                                </a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div
                                                                    class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                                    {{ $students_count }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card card-stats radius shadow-2xl bg-gradient-default">
                                                    <!-- Card body -->
                                                    <div class="card-body radius shadow-2xl">
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="">
                                                                    <h4 class="card-title text-uppercase text-muted mb-0">YOUR <br>SUBJECTS</h4>
                                                                </a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                                    {{ count($subjects) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h1 class="display-6 card-title   text-muted mb-0">
                                            Welcome {{ $user->role == 'Admin' ? 'Head Teacher' : 'Teacher' }}
                                        </h1>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, 
                                            but the majority have suffered alteration in some form, by injected humour, 
                                            or randomised words which don't look even slightly believable. If you are
                                             going to use a passage of Lorem Ipsum, you need to be sure there isn't 
                                             anything embarrassing hidden in the middle of text. All the Lorem Ipsum 
                                             generators on the Internet tend to repeat predefined chunks as necessary,
                                              making this the first true generator on the Internet. It uses a dictionary 
                                              of over 200 Latin words, combined with a handful of model sentence structures, 
                                              to generate Lorem Ipsum which looks reasonable. 
                                        </p>
                                    </div>
                                </div>
                               
                                {{-- <div class="row">
                                    <div class="col-12  py-4">
                                        <div class="card border-0 " style="background:none;">
                                        <!-- Card body  shadow-2xl-->
                                            <div class="card-body ">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col">
                                                        <a href="">
                                                         
                                                        </a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div
                                                            class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                            <i class="fa fa-rocket" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-6">
                                        <div class="container-fluid mt-4">
                                            <div class="row">
                                                <div class="col col-lg-12">
                                                    <div class="card radius shadow-2xl mx-4 bg-gradient-default">
                                                        <div class="card-header bg-gradient-default">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 text-center " >
                                                                    <h3 class="mb-0 text-white">Daily Attendance Form</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body radius shadow-2xl px-5">
                                                            <form method="post" action="{{ route('attendance.store') }}">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-muted" for="subject">Attendance Subject <span class="text-danger">*</span></label>
                                                                            <select id="subject" name="subject_id"  class="form-control radius">
                                                                                <option value="">Select Subject</option>
                                                                            @foreach($subjects as $subject)
                                                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('subject_id')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-muted" for="input-date">Attendance Date <span class="text-danger">*</span></label>
                                                                            <input class="form-control datepicker  @error('date') is-invalid @enderror " name="date" id="input-date" placeholder="Select date" type="text" value="07/13/2021">
                                                                            @error('date')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mx-3">
                                                                    {{-- type="submit" --}}
                                                                    <button  class="btn bg-gradient-red  text-light btn-lg btn-block radius">Submit</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <!--/ Header -->
        {{-- <div class="container-fluid mt--6 ">
                <div class="row">
                    <div class="col col-lg-12">
                        <div class="card radius shadow-2xl">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Start Attendance</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <i class="fas fa-calendar-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body radius shadow-2xl">
                                <form method="post" action="{{ route('attendance.store') }}">
                                    @csrf
                                    <h6 class="heading-small text-muted mb-4">Attendance information</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="subject">Select Subject*</label>
                                                <select id="subject" name="subject_id"  class="form-control radius">
                                                    <option value="">Select Subject</option>
                                                @foreach($subjects as $subject)
                                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('subject_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-date">Choose Date*</label>
                                                <input class="form-control datepicker  @error('date') is-invalid @enderror " name="date" id="input-date" placeholder="Select date" type="text" value="07/13/2021">
                                                @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block radius">Start Attendance</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

    </div>
    <!-- Page Content -->


@endsection
