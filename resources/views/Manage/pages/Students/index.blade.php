@extends('Manage.layouts.app')

@section('content')
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <div class="header bg-white">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">

                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            @if(Auth::user()->role == 'Admin')
                            <button class="btn btn-sm btn-neutral bg-smcl-blue text-white"  data-toggle="modal" data-target="#createStudent">Create new Student</button>
                            <!-- Create Student Modal -->
                            @include('Manage.pages.Students.modals.CreateStudentModal')
                            <!--/ Create Student Modal -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-4 text-smcl-blue">
            <div class="row">
                <div class="col-12">
                    <!-- Table -->
                    <div class=" bg-white">
                        <!-- Card header -->
                        <div class="card-header border-0 bg-white ">
                            <h3 class="mb-0 text-smcl-blue">{{ $subTitle }}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive ">
                            <table class="table align-items-center table-flush datatable-buttons">
                                <thead class="bg-white text-smcl-blue">
                                <tr>
                                    <th scope="col" class="sort" data-sort="employee">Name</th>
                                    <th scope="col" class="sort" data-sort="employee">Email</th>
                                    {{-- <th scope="col" class="sort" data-sort="service">Phone</th> --}}
                                    @if(Auth::user()->role == 'Admin')
                                    <th scope="col" class="sort" data-sort="action">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody class="list text-smcl-blue">
                                @foreach ($students as $student)
                                    <tr>
                                        <td class="text-capitalize">
                                            {{ $student->name }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $student->email }}
                                        </td>
                                        {{-- <td class="text-md">
                                            {{ $student->phone }}
                                        </td> --}}
                                        @if(Auth::user()->role == 'Admin')
                                        <td>
                                            <button data-toggle="modal" data-target="#updateStudent-{{ $student->id }}" class="btn btn-sm bg-green text-white m-0 radius" title="edit">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                            </button>
                                            <!-- Update Student Modal -->
                                            @include('Manage.pages.Students.modals.UpdateStudentModal', ['student' => $student])
                                            <!--/ Update Student Modal -->
                                            <a href="{{ route('student.show', $student) }}" class="btn btn-sm bg-blue text-white m-0 radius" title="edit">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('student.destroy', $student) }}" class="d-inline" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm bg-red text-white radius" title="delete">
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif
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

@endpush
