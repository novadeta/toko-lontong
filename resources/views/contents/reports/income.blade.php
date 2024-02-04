@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                Pemasukan 
              </h4>
              <div class="card" bis_skin_checked="1">
                {{-- <div class="card-header" bis_skin_checked="1">
                  <h5 class="card-title">Filter</h5>
                  <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0" bis_skin_checked="1">
                    <div class="col-md-4 income_status" bis_skin_checked="1">
                      <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4 income_status" bis_skin_checked="1">
                      <select id="incomeStatus" class="form-select text-capitalize">
                        <option value="">Relevansi</option>
                        <option value="Scheduled">Penjualan tertinggi</option>
                        <option value="Publish">Penjualan terendah</option>
                    </select>
                  </div>
                  </div>
                </div> --}}
                <div class="card-datatable table-responsive">
                  <div id="DataTables_Table_0_wrapper" >
                    <div class="card-header d-flex align-items-md-center justify-content-sm-between border-top rounded-0 py-2 flex-wrap ">
                        <div class="row justify-content-end w-100 mx-auto p-0">
                            <div class="col col-md-2 p-0 align-self-md-end">

                            </div>
                        </div>
                    </div>
                    <div class="mx-4">
                        <table id="data" class="table border-top  collapsed" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($incomes as $income)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $income->created_at }}</td>
                                    <td>
                                        <ul class="p-0" style="max-height:150px; overflow-x:hidden; list-style-position: inside;">
                                            @foreach($income->products as $product)
                                                <li>{{ $product->name }} <small>{{ $product->pieces }}pcs</small></li>     
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $income->price }}</td>
                                    <td>{{ $income->sales_amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
              </div>
        </div>
    </div>
  </div>
  @endsection
  @section('script')

<!-- include jQuery library -->

<!-- include FilePond library -->
<script src="{{ asset('assets/vendor/libs') }}/filepond/filepond.js"></script>

<!-- include FilePond plugins -->

<!-- include FilePond jQuery adapter -->
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
  <script>
    $('.filepond').filepond();

    $('.filepond').filepond({
        labelIdle : 'Letakkan file gambar disini atau<span class="filepond--label-action"> Browser </span>',
        name : 'image',
        credits: null,
        storeAsFile: true,
      });

    new DataTable('#data');
  </script>
  @endsection