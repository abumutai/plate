<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Availability reports {{$query}} stocks</title>
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
              <h3 class="card-title">Reports for categories </h3>
            </div>
            <div class="card-body">
      
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Subcategory</th>
                  <th>Quantity</th>
                  <th>Date</th>
                  <th>Type</th>
                </tr>
                </thead>
                <tbody>
                @if ($query=='all'||$query==null)
                @if ($stocks!=null)
                  @foreach ($stocks as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->subcategory}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="text-success">Added</span></td>
                  </tr> 
                  @endforeach
                  @else
                  <tr>
                  </tr>
                  @endif
                  @foreach ($movedstocks as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->subcategory}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="text-warning">Moved</td>
                  </tr>
                  @endforeach
                  @foreach ($destroyedstocks as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->subcategory}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="text-danger">Destroyed</td>
                  @endforeach
                @elseif($query=='added')
                  @foreach ($stocks as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->subcategory}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="text-success">Added</span></td>
                  </tr>
                  @endforeach
                @elseif($query=='moved')
                  @foreach ($movedstocks as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->subcategory}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="text-warning">Moved</span></td>
                  </tr>
                  @endforeach
                @elseif($query=='destroyed')
                  @foreach ($destroyedstocks as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->subcategory}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->created_at}}</td>
                    <td class="text-danger">Destroyed</span></td>
                  </tr>
                  @endforeach
                @endif
                
                </tbody>
                {{-- <tfoot>
                <tr style="text-align: right;">
                  <th colspan="4">Total Value</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> --}}
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
