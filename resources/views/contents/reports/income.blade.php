@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
          <div class="row justify-content-between mb-4">
            <div class="col-md-4">
                <h4>
                    Pemasukan 
                </h4>
              </div>
            <div class="col-md-4 d-flex justify-content-end align-items-start">
                <a 
                    href="{{ route('report.exportExpense') }}"
                    class="btn btn-primary"
                >
                    Eksport Data
                </a> 
            </div>
        </div>
              <div class="card" bis_skin_checked="1">
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
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($incomes as $income)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $income->created_at }}</td>
                                    <td>
                                        <ul class="p-2  list-unstyled" style="max-height:150px; overflow-x:hidden; list-style-position: inside;">
                                            @foreach($income->products as $product)
                                                <li>{{ $product->name }} | {{ $product->pieces }} pcs</li>     
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $income->price }}</td>
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