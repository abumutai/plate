@extends('layouts.admin')
@section('content')
<div class="">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <h2 class="text-center display-4">Profit/Loss Reports</h2>
            <form action="{{route('profitloss')}}" method="GET">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Select Date</label>
                                    <input value="{{$period}}" type="date" name="period" class="form-control">
                                </div>
                            </div>     
                            <div class="col-1 form-group mt-1" >
                                <button type="submit"style="margin-top: 30px;border:none;margin-left:-15px;" class="btn btn-md btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Reports Sales, Moved Stock, Expenses and Profit/Loss </h3>
                    </div>
                    <div class="card-body">
                  
                      <div class="d-flex justify-content-end mb-2">
                        <span style="margin-right: 300px;"><h3>Period: {{\Carbon\Carbon::parse($period)->format('Y-m-d')}}</h3></span>
                        <form action="{{route('profitloss.print') }}">
                          <input type="hidden" name="period" value="{{$period}}">
                        <button class="btn btn-primary">Export to PDF</button>
                      </form>
                      </div>
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Period</th>
                          <th>Expenses</th>
                          <th>Moved Stock</th>
                          <th>Sales</th>
                          <th>Profit/Loss</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                          <tr>
                            <td>Day</td>
                            <td>{{$todayexpenses}}</td>
                            <td>{{$todaypurchases}}</td>
                            <td>{{$todaysales}}</td>
                            <td class="{{$todaysales-($todayexpenses+$todaypurchases)>0?'text-success':'text-danger'}}">{{$todaysales-($todayexpenses+$todaypurchases)}}</td>
                          </tr> 
                          <tr>
                            <td>Week</td>
                            <td>{{$weeklyexpenses}}</td>
                            <td>{{$weeklypurchases}}
                            <td>{{$weeklysales}}</td>
                            <td class="{{$weeklysales-($weeklyexpenses+$weeklypurchases)>0?'text-success':'text-danger'}}">{{$weeklysales-($weeklyexpenses+$weeklypurchases)}}</td>
                          </tr> 
                          <tr>
                            <td>Month</td>
                            <td>{{$monthlyexpenses}}</td>
                            <td>{{$monthlypurchases}}
                            <td>{{$monthlysales}}</td>
                            <td class="{{$monthlysales-($monthlyexpenses+$monthlypurchases)>0?'text-success':'text-danger'}}">{{$monthlysales-($monthlyexpenses+$monthlypurchases)}}</td>
                          </tr> 
                          <tr>
                            <td>Year</td>
                            <td>{{$yearlyexpenses}}</td>
                            <td>{{$yearlypurchases}}
                            <td>{{$yearlysales}}</td>
                            <td class="{{$yearlysales-($yearlyexpenses+$yearlypurchases)>0?'text-success':'text-danger'}}">{{$yearlysales-($yearlyexpenses+$yearlypurchases)}}</td>
                          </tr> 
                    
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
    </section>
  </div>
@endsection