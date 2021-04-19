<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profit/Loss Report</title>
    <style>
        body{
            font-family:Arial, Helvetica, sans-serif;
        }
        table, th, td {
            border: 1px solid grey;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            margin-left: 5%;
            margin-right: 5%;
            border: 1px ridge #f2f2f2;;
        }
        th {
             height: 50px;
        }
        td{
            padding: 15px;
            text-align: center;
        }
        .card-header{
            text-align: center
        }
        tr:nth-child(even) 
        {
            background-color: #f2f2f2;
        }
        th {
            background-color: indigo;
            color: white;
        }
        h3{
            color: indigo;
        }
        .text-success{
            color: green;
        }
        .text-danger{
            color: red;
        }
        .text-warning{
            color: yellow;
        }
    </style>

</head>
<body>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <span style="margin-right: 300px;"><h3>Expenses, Moved Stock and Sales Report for Period: {{\Carbon\Carbon::parse($period)->format('Y-m-d')}}</h3></span>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-end mb-2">
                 
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Period</th>
                      <th>Expenses</th>
                      <th>Consumed</th>
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
</body>
</html>