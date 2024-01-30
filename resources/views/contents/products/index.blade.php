@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                Produk 
              </h4>
              <div class="card" bis_skin_checked="1">
                <div class="card-header" bis_skin_checked="1">
                  <h5 class="card-title">Filter</h5>
                  <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0" bis_skin_checked="1">
                    <div class="col-md-4 product_status" bis_skin_checked="1"><select id="ProductStatus" class="form-select text-capitalize"><option value="">Status</option><option value="Scheduled">Scheduled</option><option value="Publish">Publish</option><option value="Inactive">Inactive</option></select></div>
                    <div class="col-md-4 product_category" bis_skin_checked="1"><select id="ProductCategory" class="form-select text-capitalize"><option value="">Category</option><option value="Household">Household</option><option value="Office">Office</option><option value="Electronics">Electronics</option><option value="Shoes">Shoes</option><option value="Accessories">Accessories</option><option value="Game">Game</option></select></div>
                    <div class="col-md-4 product_stock" bis_skin_checked="1"><select id="ProductStock" class="form-select text-capitalize"><option value=""> Stock </option><option value="Out_of_Stock">Out of Stock</option><option value="In_Stock">In Stock</option></select></div>
                  </div>
                </div>
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
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col mb-3">
                                                  <label for="nameWithTitle" class="form-label">Nama Produk</label>
                                                  <input
                                                    type="text"
                                                    id="nameWithTitle"
                                                    class="form-control"
                                                    placeholder="Masukkan nama prouk" />
                                                </div>
                                              </div>
                                              <div class="row g-2">
                                                <div class="col mb-0">
                                                  <label for="picture" class="form-label">Gambar</label>
                                                  <input
                                                    type="file"
                                                    id="piiture"
                                                    class="filepond" />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Tutup
                                              </button>
                                              <button type="button" class="btn btn-primary">Simpan</button>
                                            </div>
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
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Penjualan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td class="d-flex justify-content-start gap-2">
                                        <a href="" class="btn btn-primary">
                                            <i class='bx bx-pencil'></i>
                                        </a>
                                        <a href="" class="btn btn-danger">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </td>
                                </tr>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<!-- include FilePond library -->
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

<!-- include FilePond plugins -->
<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

<!-- include FilePond jQuery adapter -->
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
  <script>
 // Turn input element into a pond
    $('.filepond').filepond();

    // Turn input element into a pond with configuration options
    $('.filepond').filepond({
        allowMultiple: true,
        imageValidateSizeMaxWidth : 100,
        labelIdle : 'Letakkan file gambar disini atau<span class="filepond--label-action"> Browser </span>'

    });

    // Set allowMultiple property to true
    $('.filepond').filepond('allowMultiple', false);

    // Listen for addfile event
    $('.filepond').on('FilePond:addfile', function (e) {
        console.log('file added event', e);
    });
    new DataTable('#data');
  </script>
  @endsection