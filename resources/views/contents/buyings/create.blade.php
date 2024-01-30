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
                          <input type="text" class="form-control" id="basic-default-name" placeholder="Cari produk" />
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6 col-lg-4">
                          <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-4">
                                <img class="w-100 h-100 rounded-3 object-fit-cover" src="../assets/img/elements/12.jpg" alt="Card image" />
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
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row mb-3">
                      <label class="col-sm-12 col-form-label" for="basic-default-name">Nama Produk</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="Cari produk" />
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
$.ajax({
  url: {{ route('') }}"./routes/transaction.php?action=get_transaction",
  type: "POST",
  data : {
    date_play : "<?= date("Y-m-d") ?>",
    id_field : "1"
  },
  success: function (data){
    let dataParse = JSON.parse(data)
    let status = null
    for (let index = 0; index < dataParse.length; index++) {
      (dataParse[index]["status"] == "0") ? status = 'Batal' : 
      (dataParse[index]["status"] == "1") ? status = 'Menunggu Pembayaran' : 
      (dataParse[index]["status"] == "2") ? status = 'Sedang Ditinjau' : 
      (dataParse[index]["status"] == "3") ? status = 'Berhasil' : 
      status = "Belum Diketahui"
      let content = ` <tr>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col px-3 justify-center">
                                <p class="mb-0 font-semibold  leading-normal text-md">${dataParse[index]["start_time"].slice(0,5)}</p>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-normal text-md">${dataParse[index]["end_time"].slice(0,5)}</p>
                          </td>
                          <td class="px-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                            <span class="bg-gradient-to-tl ${status == 'Batal' 
                              ? 'from-red-500 to-red-400' : status == "Menunggu Pembayaran" 
                              ? "from-yellow-500 to-yellow-400" : status == "Sedang Ditinjau" 
                              ? "from-emerald-500 to-teal-400" : status == "Berhasil" 
                              ? "from-emerald-500 to-teal-400" : ""} px-2 text-xs rounded-1.8 py-2.2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                            ${status}
                            </span>
                          </td>
                        </tr>`;
    schedule.insertAdjacentHTML('beforeend',content);
    }
  }})
</script>
@endsection