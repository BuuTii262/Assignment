<div id="AddModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('store-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label class="d-flex flex-row"><div class="text-danger">*</div> Name</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                class="form-control @error('name') is-invalid @enderror" id="name">
                                @error('name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>   
                            <br>
                            {{-- <div class="form-elememt">
                                <input type="checkbox" name="status">                      
                                <label>Status (is Publish?)</label>
                            </div> --}}
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="status">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Status (is Publish?)
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-elememt">
                                <label class="d-flex flex-row"><div class="text-danger">*</div> Category Image</label>
                                <input type="file" name="image">                      
                            </div>
        
                            <br>
                            
                            <div class="form-elememt">
                                <label class="d-flex flex-row"><div class="text-danger">*</div> Category Icon</label>
                                <input type="file" name="icon">                      
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <div class="form group d-flex justify-content-end">
                            <input type="submit" name="submit" class="btn btn-success btn-md" value="Save Category">
                            &nbsp;&nbsp;&nbsp; 
                            <button type="button" class="btn btn-secondary btn-md" 
                            data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>