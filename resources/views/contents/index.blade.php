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
  
                <a href="{{ route('buying.index') }}" class="btn btn-sm btn-outline-primary">Lihat Penjualan</a>
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
            {{-- <div class="d-flex justify-content-end">
              <div class="dropdown">
                <button
                  class="btn btn-md btn-outline-primary dropdown-toggle"
                  type="button"
                  id="dropdown-year"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false">
                  2024
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId" style="max-height: 300px; overflow-x:hidden;">
                  <a class="dropdown-item" onclick="changeRecapRevenue('2019')">2019</a>
                  <a class="dropdown-item" onclick="changeRecapRevenue('2020')">2020</a>
                  <a class="dropdown-item" onclick="changeRecapRevenue('2021')">2021</a>
                  <a class="dropdown-item" onclick="changeRecapRevenue('2022')">2022</a>
                  <a class="dropdown-item" onclick="changeRecapRevenue('2023')">2023</a>
                  <a class="dropdown-item" onclick="changeRecapRevenue('2024')">2023</a>
                </div>
              </div>
            </div> --}}
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
      <div class="col-md-6 col-lg-4 order-1 mb-4">
        <!-- Order Statistics -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
              <div class="card-title mb-3">
                <h5 class="m-0 me-2">Produk terjual tertinggi</h5>
              </div>
            </div>
            <div class="card-body">
              <ul class="p-0 m-0" id="top-product">
               
              </ul>
            </div>
          </div>
        </div>
        <!--/ Order Statistics -->
      </div>
      <div class="col-md-12 col-lg-12 order-1 mb-4">
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
    function changeRecapRevenue(params) {
      document.getElementById('dropdown-year').innerText = params
      $.ajax({
        url: `{{ route('dashboard.getRecapRevenue') }}?year=${params}`,
        type: "GET",
        headers: {
          'X-CSRF-TOKEN' : '{{ csrf_token() }}'
        },
        success: function ({data}){
          let final = []
          if (data.length != 0) {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            let dataYears = [];
            dataYears[`false`] = 0
            for (let index = 0; index <= 11; index++) {
                  if (data[index] ) {
                    if (data[index]['date']) {
                      let date = new Date(data[index]['date']).getMonth()
                      dataYears[`${date}`] = data[index]['revenue_total']
                      
                    }
                }else{
                      dataYears[`false`] = dataYears[`false`] + 1
                  }
            }
           
            for (let index = 0; index < months.length; index++) {
              if (dataYears[index]) {
                final[index] = dataYears[index]
              }else{
                final[index] = 0
              } 
            }
          }
          
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
                name: 'Penjualan',
                data: final,    
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
              chart.updateSeries({
                name: 'Penjualan',
                data: final,    
              });
            }
          })
      
    }
    $.ajax({
      url: `{{ route('dashboard.getRecapRevenue') }}?year=${'2024'}`,
      type: "GET",
      headers: {
        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
      },
      success: function ({data}){
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let final = []
          if (data.length != 0) {
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            let dataYears = [];
            dataYears[`false`] = 0
            for (let index = 0; index <= 11; index++) {
                  if (data[index] ) {
                    if (data[index]['date']) {
                      let date = new Date(data[index]['date']).getMonth()
                      dataYears[`${date}`] = data[index]['revenue_total']
                      
                    }
                }else{
                      dataYears[`false`] = dataYears[`false`] + 1
                  }
            }
           
            for (let index = 0; index < months.length; index++) {
              if (dataYears[index]) {
                final[index] = dataYears[index]
              }else{
                final[index] = 0
              } 
            }
          }
        
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
              name: 'Penjualan',
              data: final,    
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
            chart.render();
          }
        })

    $.ajax({
      url: `{{ route('dashboard.getComparison') }}`,
      type: "GET",
      headers: {
        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
      },
      success: function ({data}){
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let year = []
        let revenue = []
          if (data.length != 0) {
            for (let index = 0; index < data.length; index++) {
              year.push(data[index]['year'])
              revenue.push(data[index]['revenue'])
            }
          }
        
        
        var optionsComparisonYears = {
              series: [{
              name: 'Pendapatan',
              data: revenue
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
              categories: year,
            },
            yaxis: {
              title: {
                text: 'Rp.'
              }
            },
            fill: {
              opacity: 1
            },
            tooltip: {
              y: {
                formatter: function (val) {
                  return 'Rp. ' + val
                }
              }
            }
            };
            var comparison = new ApexCharts(document.querySelector("#comparison"), optionsComparisonYears);
            comparison.render();
          }
        })

    // End CHart

    $.ajax({
      url: `{{ route('dashboard.getTopProduct') }}`,
      type: "GET",
      headers: {
        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
      },
      success: function ({data}){
        if (data) {
          let topProduct = document.getElementById('top-product');
          let number = 1;
          for (let index = 0; index < data.length; index++) {
            topProduct.insertAdjacentHTML('beforeend',
            ` <li class="d-flex mb-2 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                      <span class="avatar-initial rounded ${(index == '0') ? 'bg-label-warning' : (index == '1') ? 'bg-label-primary' : (index == '2') ? 'bg-label-secondary' : '' } ">
                        ${ number++ }
                      </span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <h6 class="mb-0">${ data[index]['name'] }</h6>
                      </div>
                      <div class="user-progress">
                        <small class="fw-medium">${ data[index]['pieces'] } Pcs</small>
                      </div>
                    </div>
                  </li>`
            )
          }
        }
        }
      })
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
  
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
  
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    // function generateArrayOfYears() {
    //   var max = new Date().getFullYear()
    //   var min = max - 9
    //   var years = []

    //   for (var i = max; i >= min; i--) {
    //     years.push(i)
    //   }
    //   return years
    // }
    // // End Of CHart
    // var years = generateArrayOfYears().toString();

    // document.getElementById('years').innerHTML = years;
  </script>
  @endsection