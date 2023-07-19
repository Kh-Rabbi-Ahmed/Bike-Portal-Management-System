@extends('frontend.master')

@section('content')

					<section class="pt-30 pb-100 bg-gray">
						<div class="container pr-30 pl-30 pb-30 bg-white">
							<div class="row h-100">
								<div class="col-lg-3 my-auto">
									<div class="product-gallery">
										<div class="">
											<img class="img-fluid" style="width: 300px;"  src="{{ asset('uploads/bikes/'.$bike->image) }}" alt="Image">

										</div>

									</div>
                                    <h3 class="mt-3"> {{ $bike->brand }} & {{ $bike->model }}</h3>

									<p class=" mb-40">
                                          @if($bike->discount_offer <= 0)
                                         Price/Day:
                                            <span> {{ $bike->price_per_day }}.TK</span>

                                        @else
                                       Price/Day :
                                        <span> <span><del class="text-danger">{{ $bike->price_per_day }}.00TK</del></span> {{ $bike->price_per_day - $bike->discount_offer }}.00 Tk</span>

                                        @endif</p>
								</div>



								{{-- 	<form class="cart mt-50 mb-20" action="#" method="post">

										<button type="submit" name="add-to-cart" value="94" class="button"> Book Now</button>
									</form> --}}


                                <div class="col-lg-9 my-auto border mt-3">
                                    <div class="comment-respond">
                                        <div class="row">
                                            <div class="col-md-8 offset-2">
                                              @if(session('message'))
                                              <div class="alert alert-{{ session('type') }}">
                                                   <p class="text-center font-weight-bolder text-dark">{{ session('message') }}</p>
                                              </div>
                                            @endif

                                            </div>

                                        </div>
                                        <h3 class="comment-reply-title">Please Rent From Here</h3>
                                        <form action="{{ route('kbr.bike.booking') }}" method="post" class="comment-form row">
                                            @csrf
                                        <div class="col-lg-6 form-group">
                                            <label for="">Form Date</label>
                                            <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                                            <input type="date" name="from_date"  value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"  class="form-control @error('from_date') is-invalid @enderror">
                                            @error('from_date') <span class="text-danger font-italic d-block">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label for="">To Date</label>
                                            <input type="date" name="to_date"  value="{{ old('to_date') }}" class="form-control @error('to_date') is-invalid @enderror">
                                            @error('to_date') <span class="text-danger font-italic d-block">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-xl-12">
                                        <textarea id="comment" name="details" placeholder="Type your comment...." aria-required="true"></textarea>
                                        </div>
                                        <div class="col-xl-12">
                                            <label for="insurance_id"> <p class="text-warning font-weight-bold">Please Select This Insurance</p>
                                                @foreach($insurances as $key => $value)
                                                <input type="checkbox" class="form-control @error('insurance_id') is-invalid @enderror" id="insurance_id" name="insurance_id" value="{{ $value->id }}"> <span class="text-success font-weight-bold">{{ $value->name }}</span>
                                                @error('insurance_id') <span class="text-danger font-italic d-block">{{ $message }}</span> @enderror
                                                @endforeach
                                            </label>
                                        </div>

                                        <div class="col-lg-12 text-right">
                                        <button type="submit" class="my-2">Book Now</button>
                                        </div>
                                        </form>
                                        </div>
                                </div>
							</div>
						</div>
						<div class="container bg-white pt-30 pb-30 pr-30 pl-30 mt-5">
							<div class="tabs-wrapper">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#description" role="tab" aria-selected="true">Bike Description</a>

								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="home-tab">

                                        <table class="table">
											<tbody>

												<tr>
													<th> Bike Brand </th>
													<td>
														<p>{{ ucfirst($bike->brand) }}</p>
													</td>
												</tr>
												<tr>
													<th>Model </th>
													<td>
														<p>{{ ucfirst($bike->model) }}</p>
													</td>
												</tr>
												<tr>
													<th>Year</th>
													<td>
														<p>{{ date("Y-m-d",strtotime($bike->year)) }}</p>
													</td>
												</tr>

                                                <tr>
													<th>Color</th>
													<td>
														<p>{{ $bike->color }}</p>
													</td>
												</tr>

                                                <tr>
													<th>CC</th>
													<td>
														<p>{{$bike->cc }}</p>
													</td>
												</tr>

                                                <tr>
													<th>Max Powe (power in db table)</th>
													<td>
														<p>{{$bike->power}}</p>
													</td>
												</tr>
                                                <tr>
													<th>Torque</th>
													<td>
														<p>{{$bike->torque }}</p>
													</td>
												</tr>

                                                <tr>
													<th>Run KM (odo in DB)</th>
													<td>
														<p>{{ $bike->odo }}</p>
													</td>
												</tr>

                                                <tr>
													<th>Description</th>
													<td>
														<p>  {{ $bike->description }}</p>
													</td>
												</tr>


											</tbody>
										</table>

                                    </div>

								</div>
							</div>
						</div>

											</section>


@stop
