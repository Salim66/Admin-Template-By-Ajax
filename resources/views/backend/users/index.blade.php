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
                      <li class="breadcrumb-item active">Users List
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
                          Users List
                        </h4>

                        <a class="btn btn-sm btn-primary float-right" data-toggle="modal" href="#add_user_modal" ><i class="fas fa-plus"></i> Add New User</a>
                        <div style="display: flex; margin-left: 0px; width: 100%;">
                            <a class="badge badge-primary" href="{{ route('list.index') }}">Published</a>
                            <a style="margin-left: 5px;" class="badge badge-danger" href="{{ route('users.trash') }}">Trash</a>
                        </div>
                      </div>
                      <div class="card-body card-dashboard">
                        <div class="table-responsive">

                            <table id="user_table" class="table table-striped">
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

     {{-- User edit modal --}}
    <div id="edit_users_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-title pt-3">
                    <h5 class="d-inline float-left ml-3">Edit User</h5>
                    <button class="close d-inline float-right mr-3" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form class="needs-validation" id="edit_user_form" novalidate="">
                    <div class="form-row">
    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="validationCustom05">Full name</label>
                                <input type="hidden" name="id" class="id">
                                <input
                                    class="form-control f_name"
                                    id="validationCustom05"
                                    type="text"
                                    name="name"
                                    placeholder="First name"
                                    required=""
                                />
                                <input type="hidden" name="id" class="user_id">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="validationCustom06">Email</label>
                                <input
                                    class="form-control f_email"
                                    id="validationCustom06"
                                    type="email"
                                    name="email"
                                    placeholder="Last name"
                                    required=""
                                />
                            </div>
                        </div>
                        @php
                            $roles = App\Models\Role::all();
                        @endphp
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="validationCustom07">User Type</label>
                                <select name="user_type" class="form-control user_type" id="validationCustom07">
                                    <option selected>----Select Type----</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                    <button class="btn btn-primary" type="submit">
                        Update user
                    </button>
                    </form>
                </div>
                <div></div>
            </div>
        </div>
    </div>

</div>
<!-- END: Content-->

 {{-- User add modal --}}
<div id="add_user_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-title pt-3">
                <h5 class="d-inline float-left ml-3">Add User</h5>
                <button class="close d-inline float-right mr-3" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" id="user_add_form" novalidate="">
                  <div class="form-row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="validationCustom01">Full name</label>
                        <input type="hidden" name="id" class="id">
                        <input
                          class="form-control"
                          id="validationCustom01"
                          type="text"
                          name="name"
                          placeholder="First name"
                          required=""
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="validationCustom02">Email</label>
                        <input
                          class="form-control"
                          id="validationCustom02"
                          type="email"
                          name="email"
                          placeholder="Last name"
                          required=""
                        />
                      </div>
                    </div>
                    @php
                        $roles = App\Models\Role::all();
                    @endphp
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="validationCustom03">User Type</label>
                        <select name="user_type" class="form-control user_type" id="validationCustom03">
                            <option selected>----Select Type----</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom04">Password</label>
                            <input
                            class="form-control"
                            id="validationCustom04"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required=""
                            />
                        </div>
                    </div>                    

                  <button class="btn btn-primary" type="submit">
                    Add user
                  </button>
                </form>
            </div>
            <div></div>
        </div>
    </div>
</div>



@endsection
