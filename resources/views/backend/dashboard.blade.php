@extends('backend.master')


@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body"><!-- Dashboard Ecommerce Starts -->
              <section id="dashboard-ecommerce">
              <div class="row">

                  <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
                  <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                      <h4 class="card-title">Visits of 2020</h4>
                      <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                      </div>
                      <div class="card-body">
                      <div id="multi-radial-chart"></div>
                      <ul class="list-inline text-center mt-1 mb-0">
                          <li class="mr-2"><span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
                          <li class="mr-2"><span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
                          <li><span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
                      </ul>
                      </div>
                  </div>
                  </div>
                  <div class="col-xl-4 col-12 dashboard-users">
                  <div class="row  ">
                      <!-- Statistics Cards Starts -->
                      <div class="col-12">
                      <div class="row">
                          <div class="col-sm-6 col-12 dashboard-users-success">
                          <div class="card text-center">
                              <div class="card-body py-1">
                              <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                  <i class="bx bx-briefcase-alt font-medium-5"></i>
                              </div>
                              <div class="text-muted line-ellipsis">New Products</div>
                              <h3 class="mb-0">1.2k</h3>
                              </div>
                          </div>
                          </div>
                          <div class="col-sm-6 col-12 dashboard-users-danger">
                          <div class="card text-center">
                              <div class="card-body py-1">
                              <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                  <i class="bx bx-user font-medium-5"></i>
                              </div>
                              <div class="text-muted line-ellipsis">New Users</div>
                              <h3 class="mb-0">45.6k</h3>
                              </div>
                          </div>
                          </div>
                          <div class="col-xl-12 col-lg-6 col-12 dashboard-revenue-growth">
                          <div class="card">
                              <div class="card-header d-flex justify-content-between align-items-center pb-0">
                              <h4 class="card-title">Revenue Growth</h4>
                              <div class="d-flex align-items-end justify-content-end">
                                  <span class="mr-25">$25,980</span>
                                  <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                              </div>
                              </div>
                              <div class="card-body pb-0">
                              <div id="revenue-growth-chart"></div>
                              </div>
                          </div>
                          </div>
                      </div>
                      </div>
                      <!-- Revenue Growth Chart Starts -->
                  </div>
                  </div>
              </div>


              </section>
              <!-- Dashboard Ecommerce ends -->

          </div>
        </div>
      </div>
      <!-- END: Content-->
@endsection
