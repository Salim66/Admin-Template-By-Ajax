@extends('backend.master')


@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
       <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
             <div class="breadcrumbs-top">
                <h5 class="content-header-title float-left pr-1 mb-0">Users</h5>
                <div class="breadcrumb-wrapper d-none d-sm-block">
                   <ol class="breadcrumb p-0 mb-0 pl-1">
                      <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                      </li>
                      <li class="breadcrumb-item active">Users Trash List
                      </li>
                   </ol>
                </div>
             </div>
          </div>
       </div>
       <div class="content-body">

            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">
                          Users Trash List
                        </h4>

                        <div style="display: flex; margin-left: 0px; width: 100%;">
                            <a class="badge badge-primary" href="{{ route('list.index') }}">Published</a>
                            <a style="margin-left: 5px;" class="badge badge-danger" href="{{ route('users.trash') }}">Trash</a>
                        </div>
                      </div>
                      <div class="card-body card-dashboard">
                        <div class="table-responsive">

                            <table id="user_trash_table" class="table table-striped">
                                <thead>
                                    <tr role="row">
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Trash</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               

                            </table>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            <!-- Column selectors with Export Options and print table -->

        </div>
    </div>

</div>
<!-- END: Content-->



@endsection
