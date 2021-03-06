@extends('Manage.layouts.app')
@section('content')
    
    <!-- Main content -->
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <!-- Header -->
        {{-- <div class="header bg-white pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-smcl-blue d-inline-block mb-0">{{ $pageTitle }}</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark radius">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">{{  $current_user->role }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{  $current_user->name }}</li>
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
                <div class="col-12">
                    <div class="">
                        <div class="card-body text-center bg-gray-100 radius shadow-2xl">
                            <img src="{{ asset(Config::get('settings.site_logo')) }}" onerror="this.onerror=null;this.src='https://picsum.photos/200';"
                                 class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                                 style="width: 140px;" alt="">
                            <h1 class="mt-4 text-smcl-red">{{ $current_user->name }}</h1>
                            <blockquote class="blockquote mb-0">
                                <p class="mb-0 text-smcl-blue">{{ $current_user->email }}</p>
                                <p class="mb-0 text-bold"><a class="text-light " href="tel:{{ $current_user->phone }}">{{ $current_user->phone }}</a> </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <!-- Stats -->
                <div class="col-12">
                    {{-- <div class="card radius shadow-2xl">
                        <!-- Card body -->
                        <div class="card-body text-smcl-blue" style="padding:15px;">
                   
                        </div>
                    </div> --}}
                    <h1 style="font-size: 18px;margin: 0px;" class="text-smcl-blue mb-3">SUMMARY</h1>
                    <div class="row">
                        <div class="col-4">
                            <div class="card bg-gradient-default radius shadow-2xl">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-white mb-0">Total Subjects Handle</h5>
                                            <span class="h2 font-weight-bold text-white mb-0">{{ $total_subjects_handle }}</span>
                                            {{-- <span class="h2 font-weight-bold text-white mb-0">{{ $current_user->subjects->count() }}</span> --}}
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card bg-gradient-default radius shadow-2xl">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-white mb-0">Total Hours</h5>
                                            <span class="h2 font-weight-bold text-white mb-0">{{ $total_number_hours }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="fa fa-hourglass-start" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card bg-gradient-default radius shadow-2xl">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-white mb-0">Status</h5>
                                            @if($today_status)
                                            <span class="h2 font-weight-bold text-white mb-0">{{ ($today_status->status == 'timeIn' ? 'TIME IN' : ( $today_status->status == 'timeOut' ? 'TIME OUT' : 'INACTIVE')) }}</span>
                                            @else
                                            <span class="h2 font-weight-bold text-white mb-0">INACTIVE</span>
                                            @endif
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    {{-- <div class="card bg-gradient-default radius shadow-2xl">
                        <!-- Card body -->
                        <div class="card-body" style="padding:15px;">
                            <h1 style="font-size: 18px;  color: white; margin: 0px;">CLASS SCHEDULE</h1>
                        </div>
                    </div> --}}
                    <h1 style="font-size: 18px;margin: 0px;" class="text-smcl-blue mb-3">CLASS SCHEDULE</h1>
                    <div class="row">
                        @if($total_subjects_handle>0)
                            @foreach($subjects as $subject)
                                <div class="col-4">
                                    <div class="card bg-gradient-default radius shadow-2xl">
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-white mb-0">{{ $subject->name }}</h5>
                                                    <span class="h2 font-weight-bold text-white mb-0">{{ date("g:i a", strtotime($subject->start_time_in)) }} - {{  date("g:i a", strtotime($subject->start_time_out)) }}</span>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center text-smcl-red">
                                <h3>No Subjects Assign</h3>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>

        <!-- Subjects -->
        {{-- <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <!-- Table -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Subjects</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable-buttons">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="number">#</th>
                                    <th scope="col" class="sort" data-sort="subject">Subject</th>
                                    <th scope="col" class="sort" data-sort="action">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach ($student->subjects as $subject)
                                    <tr>
                                        <td class="text-capitalize">
                                            <span class="badge badge-primary text-lg rounded-circle">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $subject->name }}
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#updateSubject-{{ $subject->id }}" class="btn btn-sm bg-green-500 text-white m-0 radius" title="edit">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                            </button>
                                            <!-- Update Class Modal -->
                                        @include('Manage.pages.Subject.modals.UpdateSubjectModal', ['subject' => $subject])
                                        <!--/ Update Class Modal -->
                                            <a href="{{ route('subject.show', $subject) }}" class="btn btn-sm bg-blue-500 text-white m-0 radius" title="edit">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('subject.assign-student', $subject) }}" class="btn btn-sm bg-yellow-500 text-white m-0 radius" title="Assign Students">
                                                <i class="fas fa-users-class" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('subject.destroy', $subject) }}" class="d-inline" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure? this action will remove all assigned students too')" type="submit" class="btn btn-sm bg-red-500 text-white radius" title="delete">
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
                    <!--/ Table -->
                </div>
            </div>
        </div> --}}
        <!--/ Subjects -->
    </div>
@endsection

