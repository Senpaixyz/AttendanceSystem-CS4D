@extends('Manage.layouts.app')
@section('content')
    <!-- Main content -->
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <!-- Header -->
        {{-- <div class="header bg-primary pb-6">
  
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
                            <h1 class="mt-4 text-smcl-red">{{ $student->name }}</h1>
                            <blockquote class="blockquote mb-0">
                                <p class="mb-0 text-smcl-blue">{{ $student->email }}</p>
                                <p class="mb-0 text-bold"><a class="text-smcl-blue " href="tel:{{ $student->phone }}">{{ $student->phone }}</a> </p>

                            </blockquote>
                        </div>
                    </div>
                </div>
                <!-- Stats -->
                <div class="col-12">
                    <div class="card bg-gradient-default radius shadow-2xl">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card bg-gradient-default radius shadow-2xl">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-white mb-0">Total Courses</h5>
                                            <span class="h2 font-weight-bold text-white mb-0">{{ $student->subjects->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fa fa-book" aria-hidden="true"></i>
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
                                            <h5 class="card-title text-uppercase text-white mb-0">Total Attendance</h5>
                                            <span class="h2 font-weight-bold text-white mb-0">{{ $student->present_count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
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
                                            <h5 class="card-title text-uppercase text-white mb-0">Total Absence</h5>
                                            <span class="h2 font-weight-bold text-white mb-0">{{ $student->absent_count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="fa fa-user-times" aria-hidden="true"></i>
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

