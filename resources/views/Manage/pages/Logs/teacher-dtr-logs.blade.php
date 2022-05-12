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