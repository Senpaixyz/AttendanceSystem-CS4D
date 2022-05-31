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
        <div class="header bg-white">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
    
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <button class="btn btn-sm btn-neutral bg-smcl-blue text-white"  data-toggle="modal" data-target="#createStudent">Create New User</button>
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
                    <div class="bg-white text-smcl-blue">
                        <!-- Card header -->
                        <div class="card-header border-0 bg-white">
                            <h3 class="mb-0 text-smcl-blue">{{ $subTitle }}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush datatable-buttons">
                                <thead class="bg-white text-smcl-blue">
                                <tr>
                                    <th scope="col" class="sort" data-sort="employee">Name</th>
                                    <th scope="col" class="sort" data-sort="employee">Email</th>
                                    <th scope="col" class="sort" data-sort="service">Role</th>
                                    <th scope="col" class="sort" data-sort="action">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list text-smcl-blue">
                                @foreach ($users as $user)
                                    <tr id="set-text-danger-{{ $user->id }}" class="{{ $user->status == "active" ? '' : 'text-danger' }}">
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
                                            <button data-toggle="modal" data-target="#updateTeacher-{{ $user->id }}" 
                                                class="btn btn-sm bg-green text-white m-0 radius set-status-{{ $user->id }}" title="edit"
                                                {{ $user->status == "active" ? '' : 'disabled' }}>
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                            </button>
                                            <!-- Update Student Modal -->
                                            @include('Manage.pages.Teachers.modals.UpdateTeacherModal', ['user' => $user])
                                            <!--/ Update Student Modal -->
                                            <a href="{{ route('teacher.show', $user) }}" class="btn btn-sm bg-blue text-white m-0 radius set-status-{{ $user->id }}" 
                                                title="edit" {{ $user->status == "active" ? '' : 'disabled=disabled' }}>
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>
                                            {{-- <a href="{{ route('teacher.assign-subject', $user) }}" class="btn btn-sm bg-yellow text-white m-0 radius" title="Assign Subjects">
                                                <i class="fas fa-users-class" aria-hidden="true"></i>
                                            </a> --}}
                                            <form action="{{ route('teacher.destroy', $user) }}" class="d-inline" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm bg-red text-white radius set-status-{{ $user->id }}"
                                                     title="delete" {{ $user->status == "active" ? '' : 'disabled' }}>
                                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                           
                                            @if($user->role == 'User')
                                            |
                                                <button  id="user-{{ $user->id }}" class="update-enable-disable btn btn-sm  text-smcl-blue m-0 ml-1 radius 
                                                    {{ $user->status == "active" ? 'bg-green' : 'bg-danger' }}" title="User Status">
                                                    @if($user->status == "active")
                                                        <i class="fa fa-unlock" aria-hidden="true"></i> 
                                                    @else
                                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                                    @endif 
                                                </button>
                                            @endif
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
    $(".update-enable-disable").on("click",function(){
        let form = new FormData();
        let node =  $(this).attr("id");
        let id = node.split("-")[1];
        form.append('id',id);
        let current_node = $(this);
        $.ajax({
            url: '/admin/update-enable-disable',   
            data: form,   
            contentType: false,
            processData: false,     
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data)
            {
                if(data.result == 'success'){
                    if(data.status == 'active'){
                        current_node.html(`<i class="fa fa-unlock" aria-hidden="true"></i>`);
                        current_node.removeClass('bg-danger').addClass('bg-green');
                        $(`.set-status-${data.id}`).removeAttr('disabled');
                        $(`#set-text-danger-${data.id}`).removeClass('text-danger');
                    }
                    else{
                        current_node.html(`<i class="fa fa-lock" aria-hidden="true"></i>`);
                        current_node.removeClass('bg-green').addClass('bg-danger');
                        $(`.set-status-${data.id}`).attr('disabled',true);
                        $(`#set-text-danger-${data.id}`).addClass('text-danger');
                    }
                   
                }
                else{
                    window.alert("You cannot disabled Head Teacher");
                }
            },
            error: function(e) {
                console.log(e);
                window.alert("ERROR!");   
            }
        });
    });
      
});

</script>
@endpush