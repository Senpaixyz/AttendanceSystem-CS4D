<!-- Modal -->
<div class="modal fade" id="updateTeacher-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-default">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Update User Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('teacher.update', $user) }}">
                <div class="modal-body text-left">
                    @csrf
                    @method('PUT')
                    <h6 class="heading-small text-muted text-center mb-4">Update Information of {{ $user->name }}</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="name">Fullname <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control name radius @error('name') is-invalid @enderror"
                                           value="{{ $user->name }}" name="name" placeholder="Try John Snow" required>
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
                                           value="{{ $user->email }}" name="email" placeholder="Try john@attendance.com" required>
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
                                           <option value="Admin" selected>Head Teacher(Super Admin)</option>
                                           <option value="User">Teacher</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="password">Change Password <span class="text-danger">*</span></label>
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
                    <button type="submit" class="btn bg-smcl-red radius">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
