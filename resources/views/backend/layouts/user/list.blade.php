@extends('backend.master')

@section('title')
customer-list
@endsection


@section('content')
    <!-- page start-->
 <div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                <h3 class="text-center font-weight-bold text-uppercase">customer Manage Table</h3>

            </header>
             <!--validation Message-->
            <div class="row">
                <div class="col-md-12">
             @if(session('message'))
                <div class="text-center alert alert-{{ session('type') }}">
                    <p class="text-center text-bolder">{{ session('message') }}</p>
                </div>
            @endif
                </div>
            </div>
            <div class="card-body">
                <div class="adv-table">

                       <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#customer">
                        Add New

                      </button>


                    <table  class="display table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">NID Number</th>
                                <th scope="col">Role</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Address</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)


                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td><img width="50px" height="50px" src="{{ asset('uploads/users/'.$user->image) }}" alt=""></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nid_number }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ '+880-'.$user->phone }}</td>
                                <td>{{ $user->address }}</td>

                              <td class="text-center">
                                <a class="btn btn-success btn-sm " href="{{ route('admin.user.edit',$user->id) }}"><i class="far fa-edit text-dark"></i></a>
                                <a class="btn btn-info btn-sm " href="{{ route('admin.user.show',$user->id) }}"><i class="far fa-eye text-dark"></i></a>
                                <a type="submit" class="btn btn-danger btn-sm  mx-1 delete" href= "{{ route('admin.user.delete',$user->id) }}"><i class="fas fa-trash text-dark"></i></a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>



                    </table>
                </div>
            </div>
        </section>
    </div>
</div>



  <!-- Modal -->
  <div class="modal fade" id="customer" tabindex="-1" role="dialog" aria-labelledby="customerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="customerLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form action="{{ route('admin.user.create') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
              @csrf
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name"  placeholder="Enter Name" value="{{ old('name') }}">
                  @error('name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control @error('name')is-invalid @enderror" id="email" name="email"  placeholder="Enter email" value="{{ old('email') }}">
                @error('email') <span class="text-danger font-italic">{{ $message }}</span> @enderror


              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                @error('password') <span class="text-danger text-italic">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label for="password_confirmation">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirmation Password">
                @error('password') <span class="text-danger text-italic">{{ $message }}</span>@enderror
              </div>


              <div class="form-group">
                  <label for="image">Upload Photo</label>
                 <input type="file" name="image" id="image" class=" form-control">
              </div>
              <div class="form-group">
                  <label for="phone">Contact Number</label>
                  <input type="number"class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"  placeholder="Enter Contact Number" value="{{ old('phone') }}">
                  @error('phone') <span class="text-danger text-italic">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                  <label for="nid_number">NID Number</label>
                  <input type="number"class="form-control @error('nid_number') is-invalid @enderror" id="nid_number" name="nid_number"  placeholder="Enter NID Number(123*)" value="{{ old('nid_number') }}">
                  @error('nid_number') <span class="text-danger text-italic">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                  <label for="address">Address</label>
                  <textarea name="address" id="address" placeholder="Address*" class="form-control @error('address') is-invalid @enderror"></textarea>
                  @error('address') <span class="text-danger text-italic">{{ $message }}</span>@enderror
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Customer</button>
        </div>
      </form>
      </div>
    </div>
  </div>


  <!-- End Modal Customer Add -->
<!-- page end-->


@push('js')

<script>

@if($errors->any())
$('#customer').modal('show')
@elseif ($errors->any())
$('#customer').modal('hide')
@endif
</script>

@endpush

@endsection
