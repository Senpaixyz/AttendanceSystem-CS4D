@extends('Manage.layouts.app')

@section('content')
    <div class="main-content" id="panel">
    @include('Manage.includes.header')
    <!-- Header -->
        <div class="header bg-primary">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
    
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <button class="btn btn-sm btn-neutral"  data-toggle="modal" data-target="#createStudent">Create New User</button>
                            <!-- Create Student Modal -->
                            @include('Manage.pages.Teachers.modals.CreateTeacherModal')
                            <!--/ Create Student Modal -->
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
                                    <th scope="col" class="sort" data-sort="employee">Name</th>
                                    <th scope="col" class="sort" data-sort="employee">Email</th>
                                    <th scope="col" class="sort" data-sort="service">Role</th>
                                    <th scope="col" class="sort" data-sort="action">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list text-white">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-capitalize">
                                            {{ $user->name }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $user->email }}
                                        </td>
                                        <td class="text-md">
                                            {{ $user->role == 'Admin' ? 'Head Teacher' : 'Teacher' }}
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#updateTeacher-{{ $user->id }}" class="btn btn-sm bg-green text-white m-0 radius" title="edit">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                            </button>
                                            <!-- Update Student Modal -->
                                            @include('Manage.pages.Teachers.modals.UpdateTeacherModal', ['user' => $user])
                                            <!--/ Update Student Modal -->
                                            <a href="{{ route('teacher.show', $user) }}" class="btn btn-sm bg-blue text-white m-0 radius" title="edit">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>
                                            {{-- <a href="{{ route('teacher.assign-subject', $user) }}" class="btn btn-sm bg-yellow text-white m-0 radius" title="Assign Subjects">
                                                <i class="fas fa-users-class" aria-hidden="true"></i>
                                            </a> --}}
                                            <form action="{{ route('teacher.destroy', $user) }}" class="d-inline" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm bg-red text-white radius" title="delete">
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
        </div>
    </div>
@endsection
@push('scripts')

@endpush