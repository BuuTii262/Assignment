<div id="EditModal{{$category->id}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label class="d-flex flex-row"><div class="text-danger">*</div> Name</label>
                                <input type="text" name="name" value="{{$category->name ?? old('name')}}"
                                class="form-control" id="name">
                            </div>   
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckChecked{{$category->id}}" name="status" {{ $category->status == "Yes" ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexCheckChecked{{$category->id}}">
                                    Status (is Publish?)
                                </label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-elememt">
                                @if ($category->photo == 'defaultimage.jpg')
                                <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}" width="50px" height="50px">   
                                @else
                                <img src="{{ asset('uploads/categoryImage/'.$category->photo) }}" width="50px" height="50px">  
                                @endif
                                <label class="d-flex flex-row"><div class="text-danger">*</div> Category Image</label>
                                <input type="file" name="image">                      
                            </div>
        
                            <br>
                            
                            <div class="form-elememt">
                                @if ($category->icon == 'defaultimage.jpg')
                                <img src="{{ asset('defaultPhoto/defaultfood.jpg') }}" width="50px" height="50px">   
                                @else
                                <img src="{{ asset('uploads/categoryIcon/'.$category->icon) }}" width="50px" height="50px">  
                                @endif
                                <label class="d-flex flex-row"><div class="text-danger">*</div> Category Icon</label>
                                <input type="file" name="icon">                      
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <div class="form group d-flex justify-content-end">
                            <input type="submit" name="submit" class="btn btn-warning btn-md" value="update">
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