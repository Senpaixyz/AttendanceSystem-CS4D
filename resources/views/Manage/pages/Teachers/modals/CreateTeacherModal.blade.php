<!-- Modal -->
<div class="modal fade" id="createStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-default">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('teacher.store') }}">
                <div class="modal-body text-left">
                        @csrf
                        <h6 class="heading-small  mb-4 text-muted text-center">Teacher Information</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="name">Fullname <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control name radius @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" name="name" placeholder="Try John Snow" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control email radius @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" name="email" placeholder="Try john@attendance.com" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="role">Role <span class="text-danger">*</span></label>
                                    <select id="role" class="form-control role radius"
                                           name="role">
                                           <option value="Admin" selected>Head Teacher</option>
                                           <option value="User">Teacher</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="password">Temporary Password <span class="text-danger">*</span></label>
                                    <input type="password" id="password" class="form-control password radius @error('password') is-invalid @enderror"
                                           value="{{ old('password') }}" name="password"  required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary radius" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary radius">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
