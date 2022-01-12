@extends('layout.layout_admin')
@section('dashboard')
<img src="image/_logo1.png" class="pl-3" height="60px" style="object-fit:contain;"/>
<a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i class="fas fa-times"></i></a>
<div class="p-0 mt-2">
	<a class="option col-12 " href="admin"><i class="fas fa-tachometer-alt"></i> Bảng điều khiển</a>
	<a class="option col-12" href="admin/bills"><i class="fas fa-truck"></i> Đơn đặt hàng</a>
  <a class="option col-12 active" href="admin/analyze"><i class="far fa-chart-bar"></i> Phân tích</a>
	<a class="option col-12 " href="admin/bao-mat"><i class="fas fa-shield-alt"></i> Bảo mật</a>
	<a class="option col-12 " href="logout"><i class="bi bi-box-arrow-right"></i> Đăng Xuất</a>
	</div>
@endsection

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="fas fa-bars" style="font-size:36px;"></i></a>
<h2 class="font-weight-light">Phân tích <i class="bi bi-pie-chart-fill"></i></h2>
<hr>
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
            text: 'Thống kê doanh thu 12 tháng gần đây',
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
        @if($key == 0)
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
        y   : {{$value/$product}}, 
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