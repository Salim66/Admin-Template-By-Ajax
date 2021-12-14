<?php

namespace App\Http\Controllers;

use Yajra\DataTables\EloquentDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          // check ajax request by yjra datatable
          if( request() -> ajax() ){

            return datatables()->of(User::where('trash', false)->latest()->get())->addColumn('action', function($data){
                $output = '<a title="Edit" edit_id="'.$data['id'].'" href="#" class="btn btn-sm btn-warning edit_user_data"><i class="fas fa-user-edit text-white"></i></a>';
                return $output;
            })->rawColumns(['action'])->make(true);

        }


        return view('backend.users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user_type'    => 'required',
            'name'         => 'required',
            'email'        => 'required',
            'password'     => 'required',
        ]);

        User::create([
            'user_type' =>   $request->user_type,
            'name'      =>   $request->name,
            'slug'      =>   $this->getSlug($request->name),
            'email'     =>   $request->email,
            'password'  =>   password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        return response()->json([
            'success' => 'Data added successfully ): '
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \User  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \User  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('view.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \User  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        
        //get all data
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $user_type = $request->user_type;

        // check user has or not
        $data = User::findOrFail($id);

        if($data != NULL){
            $data->user_type = $user_type;
            $data->name = $name;
            $data->slug = $this->getSlug($name);
            $data->email = $email;
            $data->update();

            return response()->json([
                'success' => 'Data updated successfully ): '
            ]);
        }else {
            return response()->json([
                'error' => 'Data not found!'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \User  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = User::find($request->id);
        if($data){

            $data->delete();

             return redirect()->back()->with('success', 'Data deleted successfully ): ');
        }else {
            return redirect()->back()->with('error', 'Sorry, Not found data! ');
        }
    }

     
    /**
    *
    *   Status update method
    */
    public function updateUserStatus($id, $val){
        $data = User::findOrFail($id);

        if($val == 1){
            $data->status = false;
            $data->update();
            return 'Data Inactive Succcessfully ): ';
        }else {
            $data->status = true;
            $data->update();
            return  'Data Active Succcessfully ): ';
        }

    }


    /**
    *
    *   Trash list page method
    */
    public function listUserTrash(){

        // check ajax request by yjra datatable
        if( request() -> ajax() ){

            return datatables()->of(User::where('trash', true)->latest()->get())->addColumn('action', function($data){
                $output = '<form style="display: inline;" action="#" method="POST" id="user_delete_form"><input type="hidden" name="id" id="delete_user" value="'.$data['id'].'"><button type="submit" class="btn btn-sm ml-1 btn-danger" ><i class="fa fa-trash"></i></button></form>';
                return $output;
            })->rawColumns(['action'])->make(true);

        }

        return view('backend.users.trash');

    }


    /**
    *
    *   Trash update method
    */
    public function updateUserTrash($id, $val){
        $data = User::findOrFail($id);

        if($val == 1){
            $data->trash = false;
            $data->update();
            return 'Data Remove Trash Succcessfully ): ';
        }else {
            $data->trash = true;
            $data->update();
            return  'Data Trash Succcessfully ): ';
        }

    }


    /**
     * User Delete
     */
    public function deleteByAjax(Request $request){

        $delete_id = $request->id;
        $data = User::findOrFail($delete_id);
        // return $data;

        try {

            if($data){
                
                $data->delete();
                return 'Data deleted successfully :) ';
                
            }

        } catch (\Throwable $th) {
            return 'Data deleted failed badly!';
        }

    }


}
