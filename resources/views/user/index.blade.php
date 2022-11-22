@extends('user.layout')
@section('content')

<style>
   .placeholders {
    margin-bottom: 30px;
    text-align: center;
   }
   .row {
      margin-right: -15px;
      margin-left: -15px;
      margin-bottom: 20px
   }
   .col-sm-3, .col-sm-6{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
   }
   .placeholders {
      margin-bottom: 30px;
      text-align: center;
   }
   .placeholder img {
      display: inline-block;
      border-radius: 50%;
   }
   .img-responsive{
      display: block;
      max-width: 100%;
      height: auto;
   }
   .placeholders img {
      vertical-align: middle;
   }
   .placeholders {
      margin-bottom: 30px;
      text-align: center;
   }

   @media (min-width: 768px){
      .col-sm-3 {
         width: 25%;
      }
   }

   /* highchart */
   .highcharts-figure,
   .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
   }

   #container {
      height: 400px;
   }

   .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
   }

   .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
   }

   .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
   }

   .highcharts-data-table td,
   .highcharts-data-table th,
   .highcharts-data-table caption {
      padding: 0.5em;
   }

   .highcharts-data-table thead tr,
   .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
   }

   .highcharts-data-table tr:hover {
      background: #f1f7ff;
   }

</style>

<div class="app-main__outer">

   <!-- Main -->
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
               </div>
               <div>
                  OVERVIEW
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12">
            <div class="row placeholders">
               <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
                  <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                  <h4 style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{ $totalTransaction }} Orders</h4>
               </div>
               <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
                  <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                  <h4 style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{ $totalTransactionDone }} Processed</h4>
               </div>
               <div class="col-xs-6 col-sm-4 placeholder" style="position: relative;">
                  <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                  <h4 style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{ $totalTransaction - $totalTransactionDone }} Pending processing</h4>
               </div>
            </div>
         </div>
         <div class="col-sm-12">
            <h2>Your Order List</h2>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>Total order amount</th>
                        <th>Created at</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($transactions))
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->tr_address }}</td>
                        <td>{{ $transaction->tr_phone }}</td>
                        <td>{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                        <td>{{ $transaction->created_at->format('d-m-Y h:i:s A') }}</td>
                        <td>
                           @if ($transaction->tr_status == 1)
                              <a href="#" class="badge bg-success" style="color: white">Processed</a>
                           @else
                              <a href="#" class="badge bg-secondary" style="color: white">Pending processing</a>
                           @endif
                        </td>
                        <td>
                           <a style="font-size: 12px; border-radius: 6px; padding: 5px 10px; border: 1px solid #999" href="{{ route('get.view.order', $transaction->id) }}"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table> 
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
@stop