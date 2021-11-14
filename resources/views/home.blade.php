<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        
        <br>
            <div class="d-flex justify-content-between">

                <h3>{{Auth::user()->name}}</h3>

                <a href="" class="btn btn-primary btn-md btnAdd mb-3" data-toggle="modal" 
                data-target="#AddModal"><i class='bx bx-plus-circle'></i> Add New</a>

                <button data-toggle="modal" data-target="#LogoutModal" class="btn btn-danger mb-3">
                    <i class='bx bx-log-out' id="log_out"></i> Logout
                </button>
                @include('logout')

            </div>   

            @include('createcate')
                    @if(Session('successAlert'))
                        <div class="alert alert-success alert-dismissibel show fade">
                            <strong>{{ Session('successAlert') }}</strong>
                            <button class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                    @error('name')
                        <div class="alert alert-danger alert-dismissibel show fade text-center">
                            <strong>{{ $message }}</strong>
                            <button class="close" data-dismiss="alert">&times;</button>
                        </div> 
                    @enderror
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Publish</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $no = 1; 
                @endphp
                @foreach ($categories as $category)
                <tr>
                    <td>{{$no++;}}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm rounded-circle" 
                        data-toggle="modal" data-target="#EditModal{{$category->id}}">
                        <i class='bx bx-edit-alt'></i>
                        </button>
                        @include('editcate')
                    </td>
                    
                    <td>
                        <button type="submit" class="btn btn-danger btn-sm rounded-circle" 
                        data-toggle="modal" data-target="#DeleteModal{{$category->id}}">
                        <i class='bx bx-trash'></i>
                        </button>
                        @include('deletecate')
                    </td>
                    
                    <td>
                        <h5><span class="badge badge-pill badge-primary">{{ $category->status }}</span></h5>
                    </td>
                    
                   
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
  
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



