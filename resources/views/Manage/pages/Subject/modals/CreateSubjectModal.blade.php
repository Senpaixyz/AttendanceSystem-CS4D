<!-- Modal -->
<div class="modal fade" id="createSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-default">
            <div class="modal-header  text-left">
                <h1 class="text-white">SMCL<br><small>Create New Subject</small></h1>
       
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('subject.store') }}">
                <div class="modal-body text-left">
                        @csrf
                        <h6 class="text-muted">Subject Information</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="name">Name*</label>
                                    <input type="text" id="name" class="form-control name radius @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" name="name" placeholder="Try Introduction to Java" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="role">Teacher</label>
                                    <select id="user_id" class="form-control role radius"
                                           name="user_id">
                                           @foreach ($users as $user)
                                           <option value="{{ $user->id }}">{{ $user->name }}</option>
                                           @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="role">Time In</label>
                                    <input class="form-control"  type='time' name="start_time_in" id="start_time_in"/>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="role">Time Out</label>
                                    <input class="form-control"  type='time' name="start_time_out" id="start_time_out"/>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="description">Description</label>
                                    <textarea type="number" id="description" class="form-control description radius @error('description') is-invalid @enderror"
                                              name="description" placeholder="Try 10" rows="6"> </textarea>
                                    @error('description')
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
