@extends('Manage.layouts.app')
@section('content')
    <!-- Main content -->
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <!-- Header -->
        {{-- <div class="header bg-white">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4"> --}}
                        {{-- <div class="col-lg-6 col-7"> --}}
                            {{-- <h6 class="h2 text-smcl-blue d-inline-block mb-0"> <a href="{{ route('dashboard') }}">Attendance</a></h6> --}}
                            {{-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark radius">
                                    <li class="breadcrumb-item"><i class="fas fa-book-open"></i></li>
                                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subjects</a></li>
                                    <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Page content -->
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="{{ Auth::user()->id == $subject->id  ? 'col-md-8' : 'col-12' }}">
                    <div class="card">
                        <div class="card-body text-center bg-white  radius shadow-2xl">
                            <h1 class="mt-4 text-smcl-blue">{{ $subject->name }}</h1>

                            <input type="hidden" value="{{ $subject->start_time_in }}" id="timeIn_data"/>
                            <input type="hidden" value="{{ $subject->start_time_out }}" id="timeOut_data"/>
                            @if(Auth::user()->id != $subject->id)
                                @foreach(\App\Models\User::all() as $user)
                                    @if($user->id == $subject->id)
                                        <h3>Mr/Ms. {{ $user->name }}</h3>
                                    @endif
                                @endforeach
                            @endif
                            <p class="mb-0 text-smcl-blue ">{{ date("g:i a", strtotime($subject->start_time_in)) }} - {{  date("g:i a", strtotime($subject->start_time_out)) }}</p>

                            <p class="text-bold text-smcl-blue ">  This class has <b>{{ $subject->students->count() }}</b> student/s. </p>
                            <hr>
                            <div class="text-left text-smcl-blue ">
                                <h2 class="text-smcl-blue ">List of all Students</h2>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush datatable-basic">
                                        <thead class="bg-white text-smcl-blue">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Name</th>
                                            <th scope="col" class="sort" data-sort="email">Email</th>
                                            <th scope="col" class="sort" data-sort="phone">Phone</th>
                                            <th scope="col" class="sort" data-sort="action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list text-smcl-blue">
                                        @foreach ($subject->students as $student)
                                            <tr>
                                                <td class="text-capitalize">
                                                    {{ $student->name }}
                                                </td>
                                                <td class="text-capitalize">
                                                    {{ $student->email }}
                                                </td>
                                                <td class="text-capitalize">
                                                    {{ $student->phone }}
                                                </td>
                                                <td class="text-capitalize">
                                                    <form action="{{ route('subject.remove.student',[$subject, $student]) }}" class="d-inline" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm bg-red-500 radius" title="Remove student">
                                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="{{ Auth::user()->id == $subject->id  ? 'col-md-4' : 'd-none' }}">
                    <div class="row">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/>
                        <input type="hidden" name="subject_id" id="subject_id" value="{{  $subject->id }}"/>
                        <div class="col-12 justify-content-center px-5" id="timeIn-div">
                            <div class="card text-white bg-gradient-default">
                                <div class="card-header d-flex  justify-content-between bg-gradient-default text-light">
                                    <small>TIME IN</small>
                                    <i class="fa fa-bars align-self-end text-success dtr-toggle-btn" style="cursor:pointer" aria-hidden="true"></i>
                                </div>
                                <div class="card-body">
                                    <h1 class="display-2 card-title text-light" id="timeIn_time"></h1>
                                    <h5 class="card-title text-light" id="timeIn_day"></h5>
                                    <p class="card-text">
                                        <small id="time-in-message">
                                            You have successfully timein to your session, you may now proceed. Have a Good Day!   
                                        </small>
                                    </p>
                                    <button class="btn btn-success w-100" id="time-in-button">Time In </button>
                                    <h5 class="card-title text-end text-light mt-3" id="timeIn_date"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 justify-content-center px-5" id="timeOut-div" style="display: none;">
                            <div class="card text-white bg-gradient-default">
                                <div class="card-header d-flex justify-content-between bg-gradient-default text-light">
                                    <small>TIME OUT</small>
                                    <i class="fa fa-bars align-self-end text-success dtr-toggle-btn" style="cursor:pointer" aria-hidden="true"></i>
                                </div>
                                <div class="card-body">
                                    <h1 class="display-2 card-title text-light" id="timeOut_time"></h1>
                                    <h5 class="card-title text-light" id="timeOut_day"></h5>
                                    <p class="card-text">
                                        <small>
                                            You have been timeout from your session successfully, Goodbye! 
                                        </small>
                                    </p>
                                    <button class="btn btn-secondary w-100" id="time-out-button">Timeout</button>
                                    <h5 class="card-title text-end text-light mt-3" id="timeOut_date"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(Auth::user()->role == 'Admin')
                        <div class="col-12 justify-content-center px-5" id="timeIn-div">
                            <div class="card text-white bg-gradient-default">
                                <div class="card-header  bg-gradient-default text-light text-center">
                                    <a href="{{ route('subject.dtr.admin-logs', $subject)  }}" class="text-light font-weight-bold"> <i class="fa fa-sign-in" aria-hidden="true"></i> View Attendance Logs</a>
                                </div>
                            </div>
                        </div>
                            
                        @elseif(Auth::user()->role == 'User')
                        <div class="col-12 justify-content-center px-5" id="timeIn-div">
                            <div class="card text-white bg-gradient-default">
                                <div class="card-header  bg-gradient-default text-light text-center">
                                    <a href="{{ route('subject.dtr.teacher-logs', $subject)  }}" class="text-light font-weight-bold"> <i class="fa fa-sign-in" aria-hidden="true"></i>View Attedance Logs</a>
                                </div>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('js/dtr.js')}}"></script>
<script type="application/javascript">
    $(document).ready(function(){
        window.initialized_dtr_script();
    });
</script>
@endpush
