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
                            <button class="btn btn-sm btn-neutral bg-smcl-blue text-white"  data-toggle="modal" data-target="#createSubject"><i class="fas fa-plus mr-1"> </i> Create New Subject</button>
                            <!-- Create Class Modal -->
                            @include('Manage.pages.Subject.modals.CreateSubjectModal')
                            <!--/ Create Class Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12">
                    <!-- Table -->
                    <div class=" bg-white">
                        <!-- Card header -->
                        <div class="card-header border-0 bg-white">
                            <h3 class="mb-0 text-smcl-blue">{{ $subTitle }}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable-buttons">
                                <thead class="bg-white  text-smcl-blue">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Name</th>
                                    <th scope="col" class="sort" data-sort="teacher">Description</th>
                                    <th scope="col" class="sort" data-sort="start">Start Time</th>
                                    <th scope="col" class="sort" data-sort="start">End Time</th>
                                    <th scope="col" class="sort" data-sort="students">Students Number</th>
                                    @if(Auth::user()->role == 'Admin')
                                    <th scope="col" class="sort" data-sort="action">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody class="list  text-smcl-blue">
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td class="text-capitalize">
                                            {{ $subject->name }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ date("g:i a", strtotime($subject->start_time_in)) }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ date("g:i a", strtotime($subject->start_time_out)) }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ Str::limit($subject->description, 30, "...") }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $subject->students_count }}
                                        </td>
                                        @if(Auth::user()->role == 'Admin')
                                        <td>
                                            <button data-toggle="modal" data-target="#updateSubject-{{ $subject->id }}" class="btn btn-sm bg-green text-white m-0 radius" title="edit">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                            </button>
                                            <!-- Update Class Modal -->
                                            @include('Manage.pages.Subject.modals.UpdateSubjectModal', ['subject' => $subject])
                                            <!--/ Update Class Modal -->
                                            <a href="{{ route('subject.show', $subject) }}" class="btn btn-sm bg-blue text-white m-0 radius" title="edit">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>
                                            {{-- <a href="{{ route('subject.assign-student', $subject) }}" class="btn btn-sm bg-yellow text-white m-0 radius" title="Assign Students">
                                                <i class="fas fa-users-class" aria-hidden="true"></i>
                                            </a> --}}
                                            <form action="{{ route('subject.destroy', $subject) }}" class="d-inline" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure? this action will remove all assigned students too')" type="submit" class="btn btn-sm bg-red text-white radius" title="delete">
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
