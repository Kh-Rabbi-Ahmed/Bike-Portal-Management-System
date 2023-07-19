@extends('backend.master')

@section('title')

Payment-History

@stop
@section('content')


  <div class="row my-3">
      <div class="col-md-8 col-sm-12 offset-md-2">

          <div class="card ">
                 {{-- Validate Msg --}}
            <div class="row">
                <div class="col-md-12">
                @if(session('message'))
                    <div class="text-center alert alert-{{ session('type') }}">
                    <p class="text-center text-bolder pt-2">{{ session('message') }}</p>
                    </div>
                @endif
                </div>
                </div>
            <div class="card-header">
             <h6 class="text-dark text-center">Payment Form</h6>
            </div>

            <div class="card-body">
              <form action="{{ route('admin.booking.payment.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="amount" class="text-dark">Add Payment</label>
                      <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                     <input type="number" name="amount" id="amount" value="" class="form-control" placeholder="00.00">
                     @error('amount') <span class="text-danger font-weight-bolder font-italic d-block">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment_method" class="text-dark">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="bkash">Bkash</option>
                        </select>
                    </div>
                    <div class="form-group" >
                        <label for="pay-time" class="text-dark">Payment Time</label>
                       <input type="time" name="pay_time" id="pay-time" value="{{ date("H:i:s") }}" class="form-control">
                       @error('pay_time') <span class="text-danger font-weight-bolder font-italic ">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group" >
                        <label for="pay-date" class="text-dark">Payment Date</label>
                       <input type="date" name="pay_date" id="pay-date" value="{{ date('Y-m-d') }}" class="form-control">
                       @error('pay_date') <span class="text-danger font-weight-bolder font-italic ">{{ $message }}</span> @enderror
                    </div>



            </div>
            <div class="card-footer">
            <a class="btn btn-secondary" href="{{ route('admin.booking.payment',$booking->id) }}"> Back</a>
            <button type="submit" class="btn btn-secondary text-white" >Do Payment</button>
            </div>
        </form>
          </div>

      </div>


  </div>




@stop
