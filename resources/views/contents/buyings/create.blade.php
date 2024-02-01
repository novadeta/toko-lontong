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
                      <div class="row mb-3">
                        <label class="col-sm-12 col-form-label" for="basic-default-name">Cari Produk</label>
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
                    <form method="POST" action="{{ route('buying.store') }}">
                      @csrf
                    <div class="row g-2 justify-content-center">
                        <div class="col-lg-12 mb-3">
                          <small class="text-light fw-medium">Produk</small>
                          <div class="demo-inline-spacing mt-2">
                            <div class="list-group" id="item-selected">
                            </div>
                          </div>
                        </div>
                      <div class="col mb-3">
                        <label class="d-block mb-2" for="">Hutang?</label>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                          <input type="radio" class="btn-check" name="debt" id="btniya" value="Y" />
                          <label class="btn btn-outline-primary" for="btniya">Ya</label>
                          <input type="radio" class="btn-check" name="debt" id="btntidak" value="N" checked/>
                          <label class="btn btn-outline-primary" for="btntidak">Tidak</label>
                        </div>
                      </div>
                      <div class="col-12 mb-3">
                        <label class="mb-2" for="total">Total Harga</label>
                        <input type="number" class="form-control" name="price" min="0" id="total" required/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2 mx-auto">
                        <button type="submit" class="w-100 btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
const formProduct = document.querySelector('form');
const itemSelected = document.getElementById('item-selected');
const itemProduct = document.getElementById('item-product');
const searchProduct = document.getElementById('search-product');
// window.onload = function () {
//   $.ajax({
//     url: `{{ route('product.search') }}?search=`,
//     type: "GET",
//     headers: {
//       'X-CSRF-TOKEN' : '{{ csrf_token() }}'
//     },
//     success: function ({data}){
//       Array.from(itemProduct.children).forEach(child => child.remove());
//       for (let index = 0; index < data.length; index++) {
//         itemProduct.insertAdjacentHTML('beforeend',
//         `<div class="col-md-6 col-lg-4">
//             <div class="card mb-3 cursor-pointer" onclick='selectItem(${data[index]['id']},"${data[index]['name']}")'>
//               <div class="row g-0">
//                 <div class="col-4">
//                   <img class="w-100 h-100 rounded-3 object-fit-cover" src="{{ asset('storage/photos') }}/${data[index]['image']}" alt="Card image" />
//                 </div>
//                 <div class="col-8">
//                   <div class="card-body">
//                     <h5 class="card-title">${data[index]['name']}</h5>
//                     <p class="card-text">
//                       Terjual : 80,000
//                     </p>
//                   </div>
//                 </div>
//               </div>
//             </div>
//           </div>`);
//       }
//     }})
// }
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
      console.log(data[0]);
      for (let index = 0; index < data.length; index++) {
      itemProduct.insertAdjacentHTML('beforeend',
      ` <div class="col-md-6 col-lg-4">
          <div class="card mb-3 cursor-pointer" onclick='selectItem(${data[index]['id']},"${data[index]['name']}")'>
            <div class="row g-0">
              <div class="col-4">
                <img class="w-100 h-100 rounded-3 object-fit-cover" src="{{ asset('storage/photos') }}/${data[index]['image']}" alt="gambar" />
              </div>
              <div class="col-8">
                <div class="card-body">
                  <h5 class="card-title">${data[index]['name']}</h5>
                  <p class="card-text">
                    Terjual 80k
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>`);
      }
    }})
})

function selectItem(id,name) {
  Array.from(itemProduct.children).forEach(child => child.remove());
  const items = document.querySelectorAll('input[name="products[]"]'); 
  let status = false
  items.forEach(child => {
    if (child.value == id) {
      return status = true;
    }
  })
  if (status == true) return false
  formProduct.insertAdjacentHTML('beforeend',`<input type="hidden" class="form-control" hidden name="products[]" value="${id}"/>  <input type="hidden" class="form-control" hidden name="units[${id}]"  value="0"/>`);
  itemSelected.insertAdjacentHTML('beforeend',`<div class="list-group-item"  id="remove-${id}" >
                                <div class="row align-content-center">
                                  <div class="col-1 align-self-center">
                                    <div class="cursor-pointer badge badge-center bg-label-danger" onclick="removeItem(${id})"">
                                      <i class='bx bx-x'></i>
                                    </div>
                                  </div>
                                  <div class="col-7 col-sm-8 align-self-center">
                                    <small class="m-0">
                                      ${name}
                                    </small>
                                  </div>
                                  <div class="col-3 col-sm-2 gap-1 align-self-center d-flex justify-content-center align-content-center">
                                    <div class="cursor-pointer mx-auto badge badge-center bg-label-danger"  onclick="calculation('minus',${id})">
                                      <i class='bx bx-minus'></i>
                                    </div>
                                    <p id="count-${id}" class="mx-auto m-0">0</p>
                                    <div class="cursor-pointer mx-auto badge badge-center bg-label-primary" onclick="calculation('plus',${id})">
                                      <i class='bx bx-plus '></i>
                                    </div>
                                  </div>
                                </div>
                              </div>`);
}

function removeItem(params) {
  let unit =  document.querySelector(`input[name="units[${params}]"]`);
  let countItem =  document.querySelector(`#remove-${params}`);
  unit.remove();
  countItem.remove();
  
}
function calculation(params,id) {
  let countItem =  document.getElementById(`count-${id}`);
  let unit =  document.querySelector(`input[name="units[${id}]"]`);
  if (params == 'plus') {
    countItem.innerText  = parseInt(countItem.innerText) + 1
    unit.value = countItem.innerText
  }else if(params  == 'minus' && countItem.innerText > 0) {
    countItem.innerText  = parseInt(countItem.innerText) - 1
    unit.value = countItem.innerText
  }else{
    return false;
  }
}
</script>
@endsection