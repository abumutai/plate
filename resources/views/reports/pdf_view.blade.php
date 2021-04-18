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
    </style>

</head>
<body>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h2 class="card-title">Availability report {{$query}} stock</h2>
                </div>
                <div class="card-body">
                  <table id="example1" class="table">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Availability Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($stocks as $item)
                     @foreach ($subcategories as $category)
                          @if ($item->subcategory==$category->name)
                          @if($query=='all'||$query==null)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->subcategory}}</td>
                      <td>{{$item->quantity}}</td>
                     
                              @if($item->quantity>=$category->threshold)
                              <td class="text-success">High</td>
                              @else
                              <td class="text-danger">Low</td>
                              @endif
                    </tr> 
                        @elseif($query=='high')
                             @if($item->quantity>=$category->threshold)
                             <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->subcategory}}</td>
                                <td>{{$item->quantity}}</td>
                               
                                        @if($item->quantity>=$category->threshold)
                                        <td class="text-success">High</td>
                                        @else
                                        <td class="text-danger">Low</td>
                                        @endif
                              </tr> 
                             @endif
                        @elseif($query=='low')
                           @if($item->quantity<$category->threshold)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->subcategory}}</td>
                                    <td>{{$item->quantity}}</td>
                                
                                            @if($item->quantity>=$category->threshold)
                                            <td class="text-success">High</td>
                                            @else
                                            <td class="text-danger">Low</td>
                                            @endif
                                </tr> 
                            @endif
                        @endif
                      @endif
                      @endforeach
                    @endforeach
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
