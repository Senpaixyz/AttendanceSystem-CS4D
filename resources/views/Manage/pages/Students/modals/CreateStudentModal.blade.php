<!-- Modal -->
<div class="modal fade" id="createStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-default ">
            <div class="modal-header  text-left">

                <h1 class="text-white">SMCL<br><small>Attendance System</small></h1>
       
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('student.store') }}">
                <div class="modal-body text-left">
                        @csrf
                        <h6 class="heading-small text-white text-center mb-4">Student information</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="name">Fullname <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control name radius @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" name="name" placeholder="John Sino" required>
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
                                           value="{{ old('email') }}" name="email" placeholder="jhicer@gmail.com" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="phone">Phone number <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" class="form-control phone radius @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}" name="phone" placeholder="+639380258562" required>
                                    @error('phone')
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
