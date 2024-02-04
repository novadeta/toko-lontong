@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                Penjualan 
            </h4>
            <div class="col-xl-12">
                <div class="nav-align-top mb-4">
                  <ul class="col-6 gap-2 mx-auto nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                      <button
                        type="button"
                        class="nav-link active"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#tab-penjualan"
                        aria-controls="tab-penjualan"
                        aria-selected="true">
                        {{-- <i class="tf-icons bx bx-home me-1"></i> --}}
                        <span class="d-none d-sm-block"> Penjualan</span>
                      </button>
                    </li>
                    <li class="nav-item">
                      <button
                        type="button"
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#tab-hutang"
                        aria-controls="tab-hutang"
                        aria-selected="false">
                        {{-- <i class="tf-icons bx bx-message-square me-1"></i> --}}
                        <span class="d-none d-sm-block"> Hutang</span>
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-penjualan" role="tabpanel">
                        <div class="table-responsive">
                            <div class="card">
                                <div class="card-header d-flex align-items-md-center justify-content-sm-between rounded-0 py-2 flex-wrap ">
                                    <div class="row justify-content-end w-100 mx-auto p-0">
                                        <div class="col col-md-2 p-0 align-self-md-end">
                                            <a
                                                href="{{ route('buying.create') }}"
                                                class="w-100 btn btn-primary">  
                                                Tambah
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-4">
                                    <table class="table border-top collapsed" id="penjualan">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Produk</th>
                                                <th>Total Harga</th>
                                                <th>Catatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactions as $debt_transaction)
                                                @if($debt_transaction->debt == 'N')
                                                    <tr>
                                                        <td>{{ 
                                                            date('d-m-Y',strtotime($debt_transaction->created_at))
                                                            }}</td>
                                                        <td>
                                                            <ul class="p-0" style="max-height:150px; overflow-x:hidden; list-style-position: inside;">
                                                                @foreach($debt_transaction->products as $product)
                                                                    <li>{{ $product->name }} <small>{{ $product->pieces }}pcs</small></li>     
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>Rp.  {{ number_format($debt_transaction->price,0,',',",") }}</td>
                                                        <td>{{ $debt_transaction->note }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-start gap-2">
                                                                <a href="{{ route('buying.edit',$debt_transaction->id) }}" class="btn btn-primary">
                                                                    <i class='bx bx-pencil'></i>
                                                                </a>
                                                                <form class="deleteButton" action="{{ route('buying.delete',$debt_transaction->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class='bx bx-trash'></i>
                                                                    </button>
                                                                </form>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-hutang" role="tabpanel">
                        <div class="table-responsive">
                            <div class="card">
                                <div class="mx-4">
                                    <table class="table border-top collapsed" id="hutanger">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Catatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactions as $debt_transaction)
                                                @if($debt_transaction->debt == 'Y')
                                                    <tr>
                                                        <td>{{ 
                                                            date('d-m-Y',strtotime($debt_transaction->created_at))
                                                            }}</td>
                                                        <td>
                                                            <ul class="p-0" style="max-height:150px; overflow-x:hidden; list-style-position: inside;">
                                                                @foreach($debt_transaction->products as $product)
                                                                    <li>{{ $product->name }} <small>{{ $product->pieces }}pcs</small></li>    
                                                                    <li>{{ $product->name }} <small>{{ $product->pieces }}pcs</small></li>    
                                                                    <li>{{ $product->name }} <small>{{ $product->pieces }}pcs</small></li>    
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>{{ number_format($debt_transaction->price,0,',',",") }}</td>
                                                        <td>
                                                            {{ $debt_transaction->note }}
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-start gap-2">
                                                                <form action="{{ route('buying.debt.update',$debt_transaction->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-success">
                                                                        <i class='bx bx-check'></i>
                                                                    </button>
                                                                </form>
                                                                <form action="{{ route('buying.debt.delete',$debt_transaction->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class='bx bx-trash'></i>
                                                                    </button>
                                                                </form>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    new DataTable('#penjualan');
    new DataTable('#hutanger');

    const buttonDelete = document.querySelectorAll('.deleteButton')
    buttonDelete.forEach(element => {
      element.addEventListener('submit', function (event) {
        event.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: "btn btn-primary mx-2",
            cancelButton: "btn btn-danger"
          },
          buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
        title: "Apakah Kamu Yakin?",
        text: "Kamu tidak akan mendapatkannya kembali",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Kembali"
      }).then((result) => {
        if (result.isConfirmed) {
         $.ajax({
           url: `${event.target.action}`,
           type: "POST",
           headers: {
             'X-CSRF-TOKEN' : '{{ csrf_token() }}'
           },
           data: {
             '_method' : 'DELETE'
           },
           success: function ({data}){
             location.reload();
           }
         });
       }
      })
    })  
    });

  </script>
  @endsection