@extends('layouts.admin')
@section('content')
<div class="">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <h2 class="text-center display-4">Reports</h2>
            <form action="{{route('reportsget')}}" method="GET">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Select:</label>
                                    <select class="select2" name="value" data-placeholder="Any" style="width: 100%;">
                                        <option value="all" {{$query=='all'?'selected':''}}>All Available Stock</option>
                                        <option value="high" {{$query=='high'?'selected':''}}>High Stock</option>
                                        <option value="low" {{$query=='low'?'selected':''}}>Low Stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Order By:</label>
                                    <select name="order" class="select2" style="width: 100%;">
                                        <option {{$order=='title'?'selected':''}} value="title">Title</option>
                                        <option {{$order=='quantity'?'selected':''}} value="quantity">Quantity</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Sort Order:</label>
                                    <select name="sort" class="select2" style="width: 100%;">
                                        <option {{$sort=='ASC'?'selected':''}}>ASC</option>
                                        <option {{$sort=='DESC'?'selected':''}}>DESC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 form-group mt-1" >
                                <button type="submit"style="margin-top: 20px;border:none;margin-left:-15px;" class="btn btn-md btn-default">
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
                      <h3 class="card-title">Stock Availability Reports</h3>
                    </div>
                
                    <div class="card-body">
                      <div class="d-flex justify-content-end mb-2">
                        <a class="btn btn-primary" href="{{route('reports.print',$query==null?'all':$query) }}">Export to PDF</a>
                      </div>
                      <table id="example1" class="table table-bordered table-striped">
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
    </section>
  </div>
@endsection