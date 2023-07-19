<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function bookingReport(){

        $bookings = Booking::all();
        $fromDate = null;
        $toDate = null;

        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
        $fromDate = $_GET['from_date'];
        $toDate = $_GET['to_date'];

        //For one date
        //$bookings = Booking::whereDate('from_date',$fromDate)->get();

        //For range date
        $bookings = Booking::whereBetween('from_date',[$fromDate,$toDate])->get();
         }
          return \view('backend.layouts.report.bookingList',\compact('bookings','fromDate','toDate'));
       }

}
