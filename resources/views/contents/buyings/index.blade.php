@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                Pembelian 
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
                        <div class="">
                            <div>
                                <label>
                                    <input type="search" class="form-control" placeholder="Cari Produk" >
                                </label>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class=" d-flex ">
                                <div class="d-flex justify-content-center align-items-center"> 
                                    <button 
                                        class="btn btn-primary" 
                                        tabindex="0" 
                                         
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalCenter">  
                                        <span class="d-none d-sm-inline-block">Tambah</span>
                                    </button> 
                                    <!-- Vertically Centered Modal -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mt-3">

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Tambah Penjualan</h5>
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
                                                        placeholder="Enter Name" />
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
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
                        <div class="mx-4">
                            <table class=" table border-top collapsed" id="ad">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
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
  <script>
    new DataTable('#ad');
  </script>
  @endsection