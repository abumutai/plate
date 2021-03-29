@extends('layouts.admin')
@section('content')
<!-- Charting library -->
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('kitchen.home')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        @foreach ($availablestocks->take(8) as $stock)
        {{-- <div class="col-lg-3 col-6"> --}}
          @foreach ($subcategories as $subcategory)

              @if ($subcategory->name==$stock->subcategory)
                @if($subcategory->threshold<$stock->quantity&&$subcategory->monitor==True)
                <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h4>{{$stock->subcategory}}</h4>
                    <h5>{{$stock->quantity.' '.$stock->metric}} </h5>
                    <p> High</p> 
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                </div> 
                </div>
                  @elseif($subcategory->threshold>$stock->quantity&&$subcategory->monitor==True)
                  <div class="col-lg-3 col-6">
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h4>{{$stock->subcategory}}</h4>
                      <h5>{{$stock->quantity.' '.$stock->metric}} </h5>
                      <p> Low</p> 
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                  </div>
                  </div>
                @endif
              @endif
          
          @endforeach
          {{-- <div class="{{$subcategories==$stock->subcategory ? $stock->quantity>$subcategories ? 'small-box bg-success' : 'small-box bg-danger' : '' }}"> --}}
        {{-- </div> --}}
        @endforeach
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="card col-md-6">
            <div class="card-header border-transparent">
              <h3 class="card-title">Stock Expiry Status</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>Stock</th>
                    <th>Name</th>
                    <th>Subcategory</th>
                    <th>Expires </th>
                    <th>Quantity</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($stocks->take(5) as $stock)
                    <tr>
                      <td><a href="pages/examples/invoice.html">{{$stock->id}}</a></td>
                      <td>{{$stock->item}}</td>
                      <td>{{$stock->subcategory}}</td>
                      <td><span class="{{$stock->expiry== null ? 'badge badge-success' : ($stock->expiry->isPast() ? 'badge badge-danger' : 'badge badge-success')}}">{{$stock->expiry == null ? 'No Expiry' : Carbon\Carbon::parse($stock->expiry)->diffForHumans()}}</span></td>
                      <td>{{$stock->quantity}}</td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                   
                </table>
                <a href="{{route('stock')}}" class="btn btn-md btn-secondary float-right" style="background-color: indigo">View All Stocks</a>
                

              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-footer -->
          </div>
  
          <div class="card col-md-6">
            <div class="card-header">
              <h3 class="card-title">Stock Availability Status</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3"> 
              <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($availablestocks->take(5) as $available)
                @foreach ($subcategories as $subcategory)
            @if ($subcategory->name==$available->subcategory)
               @if($subcategory->threshold<$available->quantity)
               <li class="item">
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title"> {{$available->subcategory}}</a>
                         <span class=" badge badge-success float-right">{{$available->quantity}}</span>
                  <span class="product-description">
                    High
                  </span>
                </div>
              </li> 
                @elseif($subcategory->threshold>$available->quantity)
                <li class="item">
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"> {{$available->subcategory}}</a>
                           <span class=" badge badge-danger float-right">{{$available->quantity}}</span>
                    <span class="product-description">
                      Low
                    </span>
                  </div>
                </li>
               @endif
            @endif
        @endforeach
        @endforeach
              </ul>
            </div>
            <!-- /.card-footer --><div class="card-footer text-center"style="color:white;background-color: indigo">
            <a href="{{route('stock.available')}}" class="uppercase" style="color: white" >View All</a>
          </div>
          </div>
      </div>
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Stock Patterns</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div id="stock-chart-container" style="height: 300px"></div>
                  <script>
                    const chart = new Chartisan({
                      el: '#stock-chart-container',
                      url: "@chart('stock_chart')",
                      hooks: new ChartisanHooks()
                      .colors('#FF0000','#00FF00')
                      .datasets([{type:'line',fill:false,borderColor:'green'},{type:'line',fill:false,borderColor:'red'}])
                      .title('The Value of Stock Added and Stock Moved in The Past Week')
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
