@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                Belanja 
              </h4>
              <div class="card" bis_skin_checked="1">
                <div class="card-datatable table-responsive">
                  <div id="DataTables_Table_0_wrapper" >
                    <div class="card-header d-flex align-items-md-center justify-content-sm-between border-top rounded-0 py-2 flex-wrap ">
                        <div class="row justify-content-end w-100 mx-auto p-0">
                            <div class="col col-md-2 p-0 align-self-md-end">
                                    <div class="my-3">
                                      <a
                                        href="{{ route('shopping.create') }}"
                                        class="w-100 btn btn-primary"
                                        >  
                                        Tambah
                                      </a> 
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-4">
                        <table id="data" class="table border-top  collapsed" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Catatan</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($shoppings as $shopping)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>
                                    <ul class="p-0" style="max-height:150px; overflow-x:hidden; list-style-position: inside;">
                                        @foreach($shopping->products as $product)
                                            <li>{{ $product->name }} <small>{{ $product->pieces }}pcs</small></li>     
                                        @endforeach
                                    </ul>
                                  </td>
                                  <td>{{ $shopping->note }}</td>
                                  <td>Rp. {{  number_format($shopping->price) }}</td>
                                  <td class="">
                                    <div class="d-flex justify-content-start gap-2">
                                      <a href="{{ route('shopping.edit',$shopping->id) }}" class="btn btn-primary">
                                          <i class='bx bx-pencil'></i>
                                      </a>
                                      <form class="deleteButton" action="{{ route('shopping.delete',$shopping->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                      </form>
                                    </div>
                                  </td>
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