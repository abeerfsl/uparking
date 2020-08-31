@extends('layouts.apprtl',['page' => __('الصفحة الرئيسية'),'pageSlug' => 'dashboard'])

@section('content')

@if(auth()->user()->hasRole('super_admin'))

  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header ">
          <div class="row">
            <div class="col-sm-6 text-right">
              <h5 class="card-category">الحجوزات السنويه</h5>
              <h2 class="card-title">أداء</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-area">
          <div id="line" style="width:100%; height:100%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 text-right">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">الارباح</h5>
          <h3 class="card-title"><i class="tim-icons icon-money-coins text-primary"></i>
                @foreach ($payment_amount as $payment_amount){{ $payment_amount->profit }}@endforeach
            </h3>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <div id="bar" style="width:100%; height:100%;"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 text-right">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">
          حجوزات المنظمات </h5>
          <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> عدد المنشئات:
            @foreach($panum as $panum){{ $panum->id}}@endforeach
          </h3>
          </div>
        <div class="card-body">
          <div class="chart-area">
        <div id="d" style="width:100%; height:100%;"></div>
          </div>
        </div>
      </div>
    </div>

  </div>

    @endif

    @if(auth()->user()->hasRole('sup_admin'))
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header text-right">
                    <h5 class="card-category"> الأرباح</h5>
                    <h3 class="card-title"><i class="tim-icons icon-money-coins text-primary"></i>
                    </h3>
                </div>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header text-right">
                    <h5 class="card-category ">عدد المواقف المتوفرة</h5>
                    <h3 class="card-title"><i class="tim-icons icon-square-pin text-primary"></i>
                      @foreach($parkingavailable as $parkingavailable)
                        @if (auth()->user()->id == $parkingavailable->sid)
                      {{$parkingavailable->st}}
                        @endif
                      @endforeach
                    </h3>
                </div>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header text-right">
                    <h5 class="card-category">عدد المستخدمين </h5>
                    <h3 class="card-title"><i class="tim-icons icon-single-02 text-primary"></i>
                      @foreach($parkingofusers as $parkingofusers)
                        @if (auth()->user()->id == $parkingofusers->sid)
                      {{$parkingofusers->name}}
                        @endif
                      @endforeach
                    </h3>
                </div>

            </div>
        </div>


    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-chart">
          <div class="card-header ">
            <div class="row">
              <div class="col-sm-6 text-right">
                <h5 class="card-category">الحجوزات السنويه</h5>
                <h2 class="card-title">أداء</h2>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
            <div id="line2" style="width:100%; height:100%;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
          $(document).ready(function() {
            demo.initDashboardPageCharts();
          });
      </script>
      <!--chart 1-->
      <script>
      Morris.Bar({
        element: 'd',
        data: [
          @foreach($parking as $parking)
            {
          y:"{{ $parking->parking_name }}", sum:"{{$parking->pid}}"
            },
          @endforeach
        ],
        xkey: 'y',
        ykeys: ['sum'],
        labels: ['موقف السيارات'],
        barColors: ['#b30000'],
        resize: true,
      });
      </script>
  <!--chart 2-->
  <script>
  Morris.Line({
    element: 'line',
    data: [
      @foreach($user_account as $user_account)
        {
      y:"{{ $user_account->year}}", sum:"{{$user_account->sum}}"
        },
      @endforeach
    ],
    xkey: 'y',
    ykeys: ['sum'],
    labels: ['عدد الحجز: '],
    lineColors: ['#b30000'],
    pointFillColors: ['#ffffff'],
    resize: true,
    smooth: true
  });
  </script>
  <!--chart 3-->
  <script>
  Morris.Bar({
    element: 'bar',
    data: [
      @foreach($payment_chart as $payment_chart)
        {
      y:"{{ $payment_chart->yearpay }}", sum:"{{$payment_chart->total}}"
        },
      @endforeach
    ],
    xkey: 'y',
    ykeys: ['sum'],
    labels: ['ارباح'],
    barColors: ['#b30000'],
    resize: true,
  });
  </script>
  <!--chart 2-->
  <script>
  Morris.Line({
    element: 'line2',
    data: [
      @foreach($p as $p)
      @if (auth()->user()->id == $p->sid)
        {
      y:"{{ $p->year1}}", sum:"{{$p->sum1}}"
        },
        @endif
      @endforeach
    ],
    xkey: 'y',
    ykeys: ['sum'],
    labels: ['الحجز: '],
    lineColors: ['#b30000'],
    pointFillColors: ['#ffffff'],
    resize: true,
    smooth: true
  });
  </script>
@endpush
