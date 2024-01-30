@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                 <a href="{{ route('product.index') }}" class="text-muted fw-light">Produk /</a> Tambah Produk
              </h4>
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Produk</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('product.create') }}">
                        @csrf
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Produk</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="..." />
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Simpan</button>
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