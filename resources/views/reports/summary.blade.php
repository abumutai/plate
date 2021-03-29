@extends('layouts.admin')
@section('content')
<div class="">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <h2 class="text-center display-4">Reports</h2>
            <form action="{{route('reportsget.expiry')}}" method="GET">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Select:</label>
                                    <select class="form-control" name="value" data-placeholder="Any" style="width: 100%;">
                                        <option {{$query=='all'?'selected':''}} value="all" >All Stock</option>
                                        <option {{$query=='added'?'selected':''}} value="added" >Added Stock</option>
                                        <option {{$query=='moved'?'selected':''}} value="moved" >Moved Stock</option>
                                        <option {{$query=='destroyed'?'selected':''}} value="destroyed" >Destroyed Stock</option>
                
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Subcategory:</label>
                                    <select name="subcategory" class="form-control" style="width: 100%;">
                                        <option value="all">All Subcategories</option>
                                        @foreach ($subcategories as $item)
                                            <option {{$subcategory==$item->name?'selected':''}}  value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>From:</label>
                                    <input value="{{$period}}" type="date" name="period" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group">
                                  <label>To:</label>
                                  <input value="{{$toperiod}}" type="date" name="toperiod" class="form-control">
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
                      <h3 class="card-title">Reports for {{$query==null?'all':$query}} stock in {{$subcategory==null?'all':$subcategory}} categories </h3>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-end mb-2">
                        <form action="{{route('reports.summary') }}">
                          <input type="hidden" name="value" value="{{$query}}">
                          <input type="hidden" name="subcategory" value="{{$subcategory}}">
                        <button class="btn btn-primary">Export to PDF</button>
                      </form>
                      </div>
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
    </section>
  </div>
@endsection