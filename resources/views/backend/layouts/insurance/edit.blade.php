@extends('backend.master')


@section('title')
Insurance-Edit
@stop


@section('content')

<div class="row">
    <div class="col-8 offset-2">
        <div class="card ">
            <div class="card-header bg-info">
              <p class="text-light font-weight-bold text-center"> Insurance Edit Form.</p>
            </div>
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
                <form action=" {{ route('admin.insurance.update',$insurance->id) }} " method="post">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name"   value="{{$insurance->name }}" placeholder="Enter Insurance Name">
                        @error('name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" class="form-control @error('company_name') is-invalid @enderror"  id="company_name" name="company_name"   value="{{ $insurance->company_name  }}" placeholder="Enter  Insurance Company's Name">
                        @error('company_name') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="insurance_fee">Insurance Fee</label>
                        <input type="text" class="form-control @error('insurance_fee') is-invalid @enderror"  id="insurance_fee" name="insurance_fee"   value="{{ $insurance->insurance_fee }}" placeholder="Enter  Insurance Fee">
                        @error('insurance_fee') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="coverage">Coverage</label>
                        <textarea name="coverage" id="coverage" placeholder="Give about insurance coverage" class="form-control" >{{ $insurance->coverage  }}</textarea>
                        @error('coverage') <span class="text-danger font-italic">{{ $message }}</span> @enderror
                    </div>


                    <div class="form-group">
                        <label for="status" ><span > Status</span></label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="active" name="status" value="active" class="custom-control-input" {{ $insurance->status == 'active' ? 'checked': '' }}>
                            <label class="custom-control-label" for="active"><span > Active</span></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="inactive" name="status" value="inactive" class="custom-control-input"  {{ $insurance->status == 'inactive' ? 'checked': '' }}>
                            <label class="custom-control-label" for="inactive"><span > Inactive</span></label>
                        </div>

                        @error('status') <span class="text-warning font-weight-bolder font-italic d-block">{{ $message }}</span> @enderror
                    </div>



                <div class="card-footer bg-info text-right">
                    <a href="{{ route('admin.insurance.list') }}" class="btn btn-secondary text-light" data-bs-dismiss="modal">Back</a>
                    <button type="submit"  class="btn btn-secondary">Update Insurance</button>
                </div>

            </form>
            </div>

          </div>

      </div>
</div>
@stop
