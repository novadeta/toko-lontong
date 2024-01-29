@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                Pembelian 
              </h4>
              <!-- Vertically Centered Modal -->
              <div class="col-lg-4 col-md-6">
                <small class="text-light fw-medium">Vertically centered</small>
                <div class="mt-3">
                  <!-- Button trigger modal -->
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCenter">
                    Launch modal
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameWithTitle" class="form-label">Name</label>
                              <input
                                type="text"
                                id="nameWithTitle"
                                class="form-control"
                                placeholder="Enter Name" />
                            </div>
                          </div>
                          <div class="row g-2">
                            <div class="col mb-0">
                              <label for="emailWithTitle" class="form-label">Email</label>
                              <input
                                type="email"
                                id="emailWithTitle"
                                class="form-control"
                                placeholder="xxxx@xxx.xx" />
                            </div>
                            <div class="col mb-0">
                              <label for="dobWithTitle" class="form-label">DOB</label>
                              <input type="date" id="dobWithTitle" class="form-control" />
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
              <div class="card mb-4" bis_skin_checked="1">
                <div class="card-widget-separator-wrapper" bis_skin_checked="1">
                  <div class="card-body card-widget-separator" bis_skin_checked="1">
                    <div class="row gy-4 gy-sm-1" bis_skin_checked="1">
                      <div class="col-sm-6 col-lg-3" bis_skin_checked="1">
                        <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0" bis_skin_checked="1">
                          <div bis_skin_checked="1">
                            <h6 class="mb-2">In-store Sales</h6>
                            <h4 class="mb-2">$5,345.43</h4>
                            <p class="mb-0"><span class="text-muted me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
                          </div>
                          <div class="avatar me-sm-4" bis_skin_checked="1">
                            <span class="avatar-initial rounded bg-label-secondary">
                              <i class="bx bx-store-alt bx-sm"></i>
                            </span>
                          </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                      </div>
                      <div class="col-sm-6 col-lg-3" bis_skin_checked="1">
                        <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0" bis_skin_checked="1">
                          <div bis_skin_checked="1">
                            <h6 class="mb-2">Website Sales</h6>
                            <h4 class="mb-2">$674,347.12</h4>
                            <p class="mb-0"><span class="text-muted me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
                          </div>
                          <div class="avatar me-lg-4" bis_skin_checked="1">
                            <span class="avatar-initial rounded bg-label-secondary">
                              <i class="bx bx-laptop bx-sm"></i>
                            </span>
                          </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                      </div>
                      <div class="col-sm-6 col-lg-3" bis_skin_checked="1">
                        <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3" bis_skin_checked="1">
                          <div bis_skin_checked="1">
                            <h6 class="mb-2">Discount</h6>
                            <h4 class="mb-2">$14,235.12</h4>
                            <p class="mb-0 text-muted">6k orders</p>
                          </div>
                          <div class="avatar me-sm-4" bis_skin_checked="1">
                            <span class="avatar-initial rounded bg-label-secondary">
                              <i class="bx bx-gift bx-sm"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 col-lg-3" bis_skin_checked="1">
                        <div class="d-flex justify-content-between align-items-start" bis_skin_checked="1">
                          <div bis_skin_checked="1">
                            <h6 class="mb-2">Affiliate</h6>
                            <h4 class="mb-2">$8,345.23</h4>
                            <p class="mb-0"><span class="text-muted me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
                          </div>
                          <div class="avatar" bis_skin_checked="1">
                            <span class="avatar-initial rounded bg-label-secondary">
                              <i class="bx bx-wallet bx-sm"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card" bis_skin_checked="1">
                <div class="card-header" bis_skin_checked="1">
                  <h5 class="card-title">Filter</h5>
                  <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0" bis_skin_checked="1">
                    <div class="col-md-4 product_status" bis_skin_checked="1"><select id="ProductStatus" class="form-select text-capitalize"><option value="">Status</option><option value="Scheduled">Scheduled</option><option value="Publish">Publish</option><option value="Inactive">Inactive</option></select></div>
                    <div class="col-md-4 product_category" bis_skin_checked="1"><select id="ProductCategory" class="form-select text-capitalize"><option value="">Category</option><option value="Household">Household</option><option value="Office">Office</option><option value="Electronics">Electronics</option><option value="Shoes">Shoes</option><option value="Accessories">Accessories</option><option value="Game">Game</option></select></div>
                    <div class="col-md-4 product_stock" bis_skin_checked="1"><select id="ProductStock" class="form-select text-capitalize"><option value=""> Stock </option><option value="Out_of_Stock">Out of Stock</option><option value="In_Stock">In Stock</option></select></div>
                  </div>
                </div>
                <div class="card-datatable table-responsive" bis_skin_checked="1">
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer" bis_skin_checked="1"><div class="card-header d-flex border-top rounded-0 flex-wrap py-md-0" bis_skin_checked="1"><div class="me-5 ms-n2 pe-5" bis_skin_checked="1"><div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label><input type="search" class="form-control" placeholder="Search Product" aria-controls="DataTables_Table_0"></label></div></div><div class="d-flex justify-content-start justify-content-md-end align-items-baseline" bis_skin_checked="1"><div class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0" bis_skin_checked="1"><div class="dataTables_length mt-0 mt-md-3 me-3" id="DataTables_Table_0_length" bis_skin_checked="1"><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="7">7</option><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="70">70</option><option value="100">100</option></select></label></div><div class="dt-buttons d-flex flex-wrap" bis_skin_checked="1"> <button class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary me-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-export me-1"></i>Export</span><span class="dt-down-arrow">▼</span></button> <button class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Product</span></span></button> </div></div></div></div><table class="datatables-products table border-top dataTable no-footer dtr-column collapsed" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1391px;">
                    <thead>
                      <tr><th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px;" aria-label=""></th><th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th><th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 434px;" aria-label="product: activate to sort column descending" aria-sort="ascending">product</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;" aria-label="category: activate to sort column ascending">category</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 60px;" aria-label="stock">stock</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 51px;" aria-label="sku: activate to sort column ascending">sku</th><th class="sorting dtr-hidden" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 81px; display: none;" aria-label="price: activate to sort column ascending">price</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 39px;" aria-label="qty: activate to sort column ascending">qty</th><th class="sorting dtr-hidden" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 103px; display: none;" aria-label="status: activate to sort column ascending">status</th><th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 76px; display: none;" aria-label="Actions">Actions</th></tr>
                    </thead><tbody><tr class="odd"><td class="control" style="" tabindex="0"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center product-name" bis_skin_checked="1"><div class="avatar-wrapper" bis_skin_checked="1"><div class="avatar avatar me-2 rounded-2 bg-label-secondary" bis_skin_checked="1"><img src="../../assets/img/ecommerce-images/product-9.png" alt="Product-9" class="rounded-2"></div></div><div class="d-flex flex-column" bis_skin_checked="1"><h6 class="text-body text-nowrap mb-0">Air Jordan</h6><small class="text-muted text-truncate d-none d-sm-block">Air Jordan is a line of basketball shoes produced by Nike</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-info me-2"><i class="bx bx-walk"></i></span>Shoes</span></td><td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" id="switch"><span class="switch-toggle-slider"><span class="switch-off"></span></span></label><span class="d-none">Out_of_Stock</span></span></td><td><span>31063</span></td><td style="display: none;" class="dtr-hidden"><span>$125</span></td><td><span>942</span></td><td style="display: none;" class="dtr-hidden"><span class="badge bg-label-danger" text-capitalized="">Inactive</span></td><td style="display: none;" class="dtr-hidden"><div class="d-inline-block text-nowrap" bis_skin_checked="1"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0" bis_skin_checked="1"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" style="" tabindex="0"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center product-name" bis_skin_checked="1"><div class="avatar-wrapper" bis_skin_checked="1"><div class="avatar avatar me-2 rounded-2 bg-label-secondary" bis_skin_checked="1"><img src="../../assets/img/ecommerce-images/product-13.png" alt="Product-13" class="rounded-2"></div></div><div class="d-flex flex-column" bis_skin_checked="1"><h6 class="text-body text-nowrap mb-0">Amazon Fire TV</h6><small class="text-muted text-truncate d-none d-sm-block">4K UHD smart TV, stream live TV without cable</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-primary me-2"><i class="bx bx-mobile-alt"></i></span>Electronics</span></td><td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" id="switch"><span class="switch-toggle-slider"><span class="switch-off"></span></span></label><span class="d-none">Out_of_Stock</span></span></td><td><span>5829</span></td><td style="display: none;" class="dtr-hidden"><span>$263.49</span></td><td><span>587</span></td><td style="display: none;" class="dtr-hidden"><span class="badge bg-label-warning" text-capitalized="">Scheduled</span></td><td style="display: none;" class="dtr-hidden"><div class="d-inline-block text-nowrap" bis_skin_checked="1"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0" bis_skin_checked="1"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control" style="" tabindex="0"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center product-name" bis_skin_checked="1"><div class="avatar-wrapper" bis_skin_checked="1"><div class="avatar avatar me-2 rounded-2 bg-label-secondary" bis_skin_checked="1"><img src="../../assets/img/ecommerce-images/product-15.png" alt="Product-15" class="rounded-2"></div></div><div class="d-flex flex-column" bis_skin_checked="1"><h6 class="text-body text-nowrap mb-0">Apple iPad</h6><small class="text-muted text-truncate d-none d-sm-block">10.2-inch Retina Display, 64GB</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-primary me-2"><i class="bx bx-mobile-alt"></i></span>Electronics</span></td><td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" checked=""><span class="switch-toggle-slider"><span class="switch-on"></span></span></label><span class="d-none">In_Stock</span></span></td><td><span>35946</span></td><td style="display: none;" class="dtr-hidden"><span>$248.39</span></td><td><span>468</span></td><td style="display: none;" class="dtr-hidden"><span class="badge bg-label-success" text-capitalized="">Publish</span></td><td style="display: none;" class="dtr-hidden"><div class="d-inline-block text-nowrap" bis_skin_checked="1"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0" bis_skin_checked="1"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" style="" tabindex="0"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center product-name" bis_skin_checked="1"><div class="avatar-wrapper" bis_skin_checked="1"><div class="avatar avatar me-2 rounded-2 bg-label-secondary" bis_skin_checked="1"><img src="../../assets/img/ecommerce-images/product-5.png" alt="Product-5" class="rounded-2"></div></div><div class="d-flex flex-column" bis_skin_checked="1"><h6 class="text-body text-nowrap mb-0">Apple Watch Series 7</h6><small class="text-muted text-truncate d-none d-sm-block">Starlight Aluminum Case with Starlight Sport Band.</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-secondary me-2"><i class="bx bxs-watch"></i></span>Accessories</span></td><td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" id="switch"><span class="switch-toggle-slider"><span class="switch-off"></span></span></label><span class="d-none">Out_of_Stock</span></span></td><td><span>46658</span></td><td style="display: none;" class="dtr-hidden"><span>$799</span></td><td><span>851</span></td><td style="display: none;" class="dtr-hidden"><span class="badge bg-label-warning" text-capitalized="">Scheduled</span></td><td style="display: none;" class="dtr-hidden"><div class="d-inline-block text-nowrap" bis_skin_checked="1"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0" bis_skin_checked="1"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control" style="" tabindex="0"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center product-name" bis_skin_checked="1"><div class="avatar-wrapper" bis_skin_checked="1"><div class="avatar avatar me-2 rounded-2 bg-label-secondary" bis_skin_checked="1"><img src="../../assets/img/ecommerce-images/product-16.png" alt="Product-16" class="rounded-2"></div></div><div class="d-flex flex-column" bis_skin_checked="1"><h6 class="text-body text-nowrap mb-0">BANGE Anti Theft Backpack</h6><small class="text-muted text-truncate d-none d-sm-block">Smart Business Laptop Fits 15.6 Inch Notebook</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-secondary me-2"><i class="bx bxs-watch"></i></span>Accessories</span></td><td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" checked=""><span class="switch-toggle-slider"><span class="switch-on"></span></span></label><span class="d-none">In_Stock</span></span></td><td><span>41867</span></td><td style="display: none;" class="dtr-hidden"><span>$79.99</span></td><td><span>519</span></td><td style="display: none;" class="dtr-hidden"><span class="badge bg-label-danger" text-capitalized="">Inactive</span></td><td style="display: none;" class="dtr-hidden"><div class="d-inline-block text-nowrap" bis_skin_checked="1"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0" bis_skin_checked="1"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control" style="" tabindex="0"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center product-name" bis_skin_checked="1"><div class="avatar-wrapper" bis_skin_checked="1"><div class="avatar avatar me-2 rounded-2 bg-label-secondary" bis_skin_checked="1"><img src="../../assets/img/ecommerce-images/product-18.png" alt="Product-18" class="rounded-2"></div></div><div class="d-flex flex-column" bis_skin_checked="1"><h6 class="text-body text-nowrap mb-0">Canon EOS Rebel T7</h6><small class="text-muted text-truncate d-none d-sm-block">18-55mm Lens | Built-in Wi-Fi | 24.1 MP CMOS Sensor</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-primary me-2"><i class="bx bx-mobile-alt"></i></span>Electronics</span></td><td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" checked=""><span class="switch-toggle-slider"><span class="switch-on"></span></span></label><span class="d-none">In_Stock</span></span></td><td><span>63474</span></td><td style="display: none;" class="dtr-hidden"><span>$399</span></td><td><span>810</span></td><td style="display: none;" class="dtr-hidden"><span class="badge bg-label-warning" text-capitalized="">Scheduled</span></td><td style="display: none;" class="dtr-hidden"><div class="d-inline-block text-nowrap" bis_skin_checked="1"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0" bis_skin_checked="1"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control" style="" tabindex="0"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center product-name" bis_skin_checked="1"><div class="avatar-wrapper" bis_skin_checked="1"><div class="avatar avatar me-2 rounded-2 bg-label-secondary" bis_skin_checked="1"><img src="../../assets/img/ecommerce-images/product-3.png" alt="Product-3" class="rounded-2"></div></div><div class="d-flex flex-column" bis_skin_checked="1"><h6 class="text-body text-nowrap mb-0">Dohioue Wall Clock</h6><small class="text-muted text-truncate d-none d-sm-block">Modern 10 Inch Battery Operated Wall Clocks</small></div></div></td><td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-warning me-2"><i class="bx bx-home-alt"></i></span>Household</span></td><td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" id="switch"><span class="switch-toggle-slider"><span class="switch-off"></span></span></label><span class="d-none">Out_of_Stock</span></span></td><td><span>29540</span></td><td style="display: none;" class="dtr-hidden"><span>$16.34</span></td><td><span>804</span></td><td style="display: none;" class="dtr-hidden"><span class="badge bg-label-success" text-capitalized="">Publish</span></td><td style="display: none;" class="dtr-hidden"><div class="d-inline-block text-nowrap" bis_skin_checked="1"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button><div class="dropdown-menu dropdown-menu-end m-0" bis_skin_checked="1"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div></div></td></tr></tbody>
                  </table><div class="row mx-2" bis_skin_checked="1"><div class="col-sm-12 col-md-6" bis_skin_checked="1"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" bis_skin_checked="1">Displaying 1 to 7 of 100 entries</div></div><div class="col-sm-12 col-md-6" bis_skin_checked="1"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate" bis_skin_checked="1"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="0" class="page-link">…</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="14" tabindex="0" class="page-link">15</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
              </div>
        </div>
    </div>
  </div>
  @endsection