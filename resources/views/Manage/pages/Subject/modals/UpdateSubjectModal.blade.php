<!-- Modal -->
<div class="modal fade" id="updateSubject-{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-default">
            <div class="modal-header text-left">
                <h1 class="text-white">Update<br> <small>{{ $subject->name }}</small></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('subject.update', $subject) }}">
                <div class="modal-body text-left">
                    @csrf
                    @method('PUT')
                        <h6 class="heading-small text-muted mb-4">Subject information</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="name">Name*</label>
                                    <input type="text" id="name" class="form-control name radius @error('name') is-invalid @enderror"
                                           value="{{ $subject->name }}" name="name" placeholder="Try Introduction to Java" required>
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
                                    <label class="form-control-label text-white" for="role">From</label>
                                    <input class="form-control"  type='time' value="{{ $subject->start_time_in }}"  name="start_time_in" id="start_time_in" required/>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="role">To</label>
                                    <input class="form-control"  type='time' value="{{ $subject->start_time_out }}"  name="start_time_out" id="start_time_out" required/>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label text-white" for="description">Description</label>
                                    <textarea type="text" id="description" class="form-control description radius @error('description') is-invalid @enderror"
                                              name="description" placeholder="Try 10" rows="6">{{ $subject->description }}</textarea>
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
                    <button type="submit" class="btn bg-smcl-red radius">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
