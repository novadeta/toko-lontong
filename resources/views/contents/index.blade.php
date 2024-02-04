@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat Datang Admin! 🎉</h5>
                <p class="mb-4">
                  Kamu mengalami kenaikan <span class="fw-medium">72%</span> penjualan hari ini. Silahkan periksa 
                  penjualanmu hari ini.
                </p>
  
                <a href="javascript:;" class="btn btn-sm btn-outline-primary">Lihat Penjualan</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="../assets/img/illustrations/man-with-laptop-light.png"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-8 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
            <ul class="nav nav-pills justify-content-center" role="tablist">
              <li class="nav-item">
                <h5>
                  Rekapitulasi Pendapatan
                </h5>
              </li>
            </ul>
            <div class="d-flex justify-content-end">
              <div class="dropdown">
                <button
                  class="btn btn-md btn-outline-primary dropdown-toggle"
                  type="button"
                  id="growthReportId"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false">
                  2019
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="max-height: 300px; overflow-x:hidden;">
                  <a class="dropdown-item" href="javascript:void(0);">2021</a>
                  <a class="dropdown-item" href="javascript:void(0);">2020</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                  <a class="dropdown-item" href="javascript:void(0);">2019</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                <div id="chart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-4 order-1 mb-4">
        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-12 order-0 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-3">
                <h5 class="m-0 me-2">Produk terjual tertinggi</h5>
              </div>
            </div>
            <div class="card-body">
              <ul class="p-0 m-0">
                <li class="d-flex mb-2 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-warning">
                      1
                    </span>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <h6 class="mb-0">Electronic</h6>
                    </div>
                    <div class="user-progress">
                      <small class="fw-medium">7 Pcs</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!--/ Order Statistics -->
      </div>
      <div class="col-md-6 col-lg-12 order-1 mb-4">
        <div class="card h-100">
          <div class="card-header">
            <ul class="nav nav-pills justify-content-center" role="tablist">
              <li class="nav-item">
                <h5>
                  Pendapatan Tiap Tahun
                </h5>
              </li>
            </ul>
          </div>
          <div class="card-body px-0">
            <div class="tab-content p-0">
              <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                <div id="comparison"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('script')
  <script>
    // Chart
    var options = {
      chart: {
        type: 'area',
      },
      dataLabels: {
        formatter: (val) => {
          return 'Rp. ' + val 
        }
      },
      series: [{
        name: 'sales',
        data: [2000000,50000,35,50,49,60,70,91,125],    
      }
    ],
      xaxis: {
        categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli', 'Agustus','September','Oktober','November','Desember']
      },
      stroke: {
        curve: 'smooth',
      },
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    var options = {
          series: [{
          name: 'Net Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['2001', '2002', '2003', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

    var comparison = new ApexCharts(document.querySelector("#comparison"), options);
    comparison.render();
    chart.render();

    // End CHart
    function generateArrayOfYears() {
      var max = new Date().getFullYear()
      var min = max - 9
      var years = []

      for (var i = max; i >= min; i--) {
        years.push(i)
      }
      return years
    }
    // End Of CHart
    var years = generateArrayOfYears().toString();

    document.getElementById('years').innerHTML = years;
  </script>
  @endsection