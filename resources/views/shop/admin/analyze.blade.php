@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<h2 class="font-weight-light">Phân tích <i class="bi bi-pie-chart-fill"></i></h2>
<hr>
<div class="col-12 d-flex flex-row my-4 p-0 flex-wrap">
  <div class="col-lg-3 rounded shadow col-sm-12 bg-dark text-light text-center p-4 mx-1 my-1">
    <p class="mt-4 fs-3 mb-0">{{number_format($total)}}đ</p>
    <p class="mb-4 fs-3 mt-0"><i class="bi bi-cash"></i> Doanh thu</p>
  </div>
  <div class="col-lg-3 rounded shadow col-sm-12 bg-info text-light text-center p-4 mx-1 my-1">
    <p class="mt-4 fs-3 mb-0">{{number_format($totalSale)}} cái</p>
    <p class="mb-4 fs-3 mt-0"><i class="bi bi-box"></i> Đã bán</p>
  </div>
  <div class="col-lg-3 rounded shadow col-sm-12 bg-danger bg-gradient text-light text-center p-4 mx-1 my-1">
    <p class="mt-4 fs-3 mb-0">{{number_format($todayTotal)}}đ</p>
    <p class="mb-4 fs-3 mt-0"><i class="bi bi-cash"></i> Hôm nay</p>
  </div>
</div>
<div id="chartAnalyze" class="border-bottom" style="width:100%; height:400px;"></div>
<div id="chartCircle" style="width:100%; height:400px"></div>
@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const chart = Highcharts.chart('chartAnalyze', {
      chart: {
        type: 'column',
      },
      title: {
        text: 'Thống kê doanh thu 30 ngày gần đây',
      },
      xAxis: {
        categories: [
                @foreach($bill as $b)
    "{{\Carbon\Carbon::parse($b->created_at)->format('d/m/Y')}}", 
                @endforeach
            ]

  },
    yAxis: {
    title: {
      text: 'Doanh thu',
    }
  },
    series: [{
      name: 'Doanh thu tháng(chưa tính lợi nhuận)',

      data: [
          @foreach($bill as $b)
            {{$b->total}},
          @endforeach
            ]
            
        }],
    }); 
});

  Highcharts.chart('chartCircle', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Thống kê sản phẩm đã bán được',
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
    },
    accessibility: {
      point: {
        valueSuffix: '%',
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        }
      }
    },
    series: [{
      name: 'Tỉ lệ',
      colorByPoint: true,
      data: [
      @foreach($percent as $key => $value)
  {
    @if ($key == 0)
      name: 'Áo Nam',
        @elseif($key == 1)
    name: 'Quần Nam',
        @elseif($key == 2)
    name: 'Áo Nữ',
        @elseif($key == 3)
    name: 'Quần Nữ',
        @elseif($key == 4)
    name: 'Đầm',
        @elseif($key == 5)
    name: 'Giày Nam',
        @elseif($key == 6)
    name: 'Giày Nữ',
        @elseif($key == 7)
    name: 'Balo',
        @endif
    y: {{$value / $product}},
  },
  @endforeach
    ],
  }],
});
</script>
@endsection
@section('title')
Phân tích
@endsection