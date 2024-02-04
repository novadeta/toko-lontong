@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                Produk 
              </h4>
              <div class="card" bis_skin_checked="1">
                {{-- <div class="card-header" bis_skin_checked="1">
                  <h5 class="card-title">Filter</h5>
                  <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0" bis_skin_checked="1">
                    <div class="col-md-4 product_status" bis_skin_checked="1">
                      <input type="date" class="form-control">
                    </div>
                    <div class="col-md-4 product_status" bis_skin_checked="1">
                      <select id="ProductStatus" class="form-select text-capitalize">
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
                                  <div class="my-3">
                                    <a
                                      href="{{ route('product.create') }}"
                                      class="w-100 btn btn-primary"
                                      data-bs-toggle="modal"
                                      data-bs-target="#modalCenter"
                                      >  
                                      Tambah
                                    </a> 
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Tambah Produk</h5>
                                            <button
                                              type="button"
                                              class="btn-close"
                                              data-bs-dismiss="modal"
                                              aria-label="Close"></button>
                                          </div>
                                          <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                          <div class="modal-body">
                                              @csrf 
                                              <div class="row">
                                                <div class="col mb-3">
                                                  <label for="nameWithTitle" class="form-label">Nama Produk</label>
                                                  <input
                                                    type="text"
                                                    id="nameWithTitle"
                                                    class="form-control"
                                                    name="name"
                                                    placeholder="Masukkan nama prouk" />
                                                </div>
                                              </div>
                                              <div class="row g-2">
                                                <div class="col mb-0">
                                                  <label for="image" class="form-label">Gambar</label>
                                                  <input
                                                    type="file"
                                                    id="image"
                                                    name="image"
                                                    class="filepond"
                                                      />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Tutup
                                              </button>
                                              <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-4">
                        <table id="data" class="table border-top  collapsed" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Penjualan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $product)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                    <td>
                                      <img width="100" height="100" class="object-fit-cover" src="{{ asset('storage/photos/' . $product->image ) }}" alt="" srcset="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sales_amount }}</td>
                                    <td class="">
                                      <div class="d-flex justify-content-start gap-2">
                                        <a href="" class="btn btn-primary">
                                            <i class='bx bx-pencil'></i>
                                        </a>
                                        <a href="" class="btn btn-danger">
                                            <i class='bx bx-trash'></i>
                                        </a>
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
  </script>
  @endsection