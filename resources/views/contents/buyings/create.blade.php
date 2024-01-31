@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                 <a href="{{ route('buying.index') }}" class="text-muted fw-light">Pembelian /</a> Tambah Pembelian
              </h4>
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Penjualan</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('product.create') }}">
                        @csrf
                      <div class="row mb-3">
                        <label class="col-sm-12 col-form-label" for="basic-default-name">Nama Produk</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="search-product" placeholder="Cari produk" />
                        </div>
                      </div>
                      <div class="row mb-5" id="item-product"></div>
                  </div>
                </div>
              </div>
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row g-2 justify-content-center">
                      <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4" onclick="selectItem(${data[index]['id']})">
                          <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-12">
                                <div class="card-body">
                                  <h6 class="card-title">Mie Instan</h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4" onclick="selectItem(${data[index]['id']})">
                          <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-12">
                                <div class="card-body">
                                  <h5 class="card-title">Mie Instan</h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4" onclick="selectItem(${data[index]['id']})">
                          <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-12">
                                <img height="50" class="w-100 rounded-3 object-fit-cover" src="../assets/img/elements/12.jpg" alt="Card image" />
                              </div>
                              <div class="col-12">
                                <div class="card-body">
                                  <h5 class="card-title">Mie Instan</h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col mb-0">
                        <label class="d-block mb-3" for="">Hutang?</label>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                          <input type="radio" class="btn-check" name="debt" id="btniya" />
                          <label class="btn btn-outline-primary" for="btniya">Ya</label>
                          <input type="radio" class="btn-check" name="debt" id="btntidak" checked/>
                          <label class="btn btn-outline-primary" for="btntidak">Tidak</label>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-sm-2 mx-auto">
                        <button type="submit" class="w-100 btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
const formProduct = document.querySelector('form');
const itemProduct = document.getElementById('item-product');
const searchProduct = document.getElementById('search-product');
window.onload = function () {
  $.ajax({
    url: `{{ route('product.search') }}?search=`,
    type: "GET",
    headers: {
      'X-CSRF-TOKEN' : '{{ csrf_token() }}'
    },
    success: function ({data}){
      Array.from(itemProduct.children).forEach(child => child.remove());
      for (let index = 0; index < data.length; index++) {
        itemProduct.insertAdjacentHTML('beforeend',
        `<div class="col-md-6 col-lg-4" onclick="selectItem(${data[index]['id']})">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-4">
                  <img class="w-100 h-100 rounded-3 object-fit-cover" src="{{ asset('storage/photos') }}/${data[index]['image']}" alt="Card image" />
                </div>
                <div class="col-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                      This is a wider card with supporting text below as a natural lead-in to additional content.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>`);
      }
    }})
}
searchProduct.addEventListener('keyup', function (event) {
  const search  = event.value
  $.ajax({
    url: `{{ route('product.search') }}?search=${event.target.value}`,
    type: "GET",
    headers: {
      'X-CSRF-TOKEN' : '{{ csrf_token() }}'
    },
    success: function ({data}){
      Array.from(itemProduct.children).forEach(child => child.remove());
      for (let index = 0; index < data.length; index++) {
      itemProduct.insertAdjacentHTML('beforeend',
      ` <div class="col-md-6 col-lg-4" onclick="selectItem(${data[index]['id']})">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-4">
                <img class="w-100 h-100 rounded-3 object-fit-cover" src="{{ asset('storage/photos') }}/${data[index]['image']}" alt="Card image" />
              </div>
              <div class="col-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to additional content.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>`);
      }
    }})
})

function selectItem(params) {
  formProduct.insertAdjacentHTML('beforeend',`<input type="hidden" class="form-control" hidden name="products[]" value="${params}"/>`);
  console.log(formProduct);
}
</script>
@endsection