@extends('backend.master')

@section('title')

insurance-single-view

@stop
@section('content')

  <div class="row">
      <div class="col-8 offset-2">
        <div class="card text-center">
            <div class="card-header bg-info">
              <p class="text-light">Insurance  Single Info.</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-justify">

                    <tr>
                        <th style="width: 150px" >Insurance Name</th>
                        <td>{{ $insurance->name}}</td>
                    </tr>
                    <tr>
                        <th scope="col"> Company Name</th>
                        <td>{{ $insurance->company_name}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Insurance Fee</th>
                        <td>{{ $insurance->insurance_fee .'.00'}} TK.</td>
                    </tr>
                    <tr>
                        <th scope="col">Insurance Covarage</th>
                        <td>{{ $insurance->coverage}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Insurance Status</th>
                        <td>{{ ucfirst($insurance->status)}}</td>
                    </tr>
                </table>

            </div>
            <div class="card-footer bg-secondary text-right">
                <a href="{{ route('admin.insurance.list') }}" class="btn btn-primary">Go Back</a>
            </div>
          </div>

      </div>

  </div>

@stop
