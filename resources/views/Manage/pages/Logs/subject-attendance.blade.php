@extends('Manage.layouts.app')

@section('content')

    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <style>
                a[disabled="disabled"] {
                pointer-events: none;
            }
        </style>
        <div class="header bg-primary">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            {{-- <h6 class="h2 text-white d-inline-block mb-0"> <a href="{{ route('dashboard') }}">Attendance</a></h6> --}}
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark radius">
                                    <li class="breadcrumb-item"><i class="fas fa-book-open"></i></li>
                                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subjects</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ route('subject.show',$subject) }}">{{ $subject->name }}</a></li>
                                    <li class="breadcrumb-item active">Logs</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <!-- Table -->
                    <div class="bg-darkgrey text-white">
                        <!-- Card header -->
                        <div class="card-header border-0 bg-darkgrey">
                            <h3 class="mb-0 text-white">{{ $subTitle }}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable-buttons">
                                <thead class="bg-darkgrey text-white">
                                <tr>
                                    {{-- <th  >Name</th> --}}
                                    <th  >Date</th>
                                    <th  >Time In</th>
                                    <th  >Time Out</th>
                                    <th  >Total Hours</th>
                                    <th  >Status</th>
                                </tr>
                                </thead>
                                <tbody class="list text-white">
                                @foreach ($user_logs as $user)
                                    <tr>
                                        {{-- <td class="text-capitalize">
                                            {{ $user->name }}
                                        </td> --}}
                                        <td class="text-capitalize">
                                            {{ $user->timeIn_fulldate }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $user->timeIn_hours }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $user->timeOut_hours }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $user->number_hours }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ ($user->dtr_status == 'timeIn') ? 'Time In' : 'Time Out' }}
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
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function(){

});

</script>
@endpush