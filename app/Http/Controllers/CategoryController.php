<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // check ajax request by yjra datatable
        if ( request()->ajax() ) {

            return datatables()->of( Category::where( 'trash', false )->latest()->get() )->addColumn( 'action', function ( $data ) {
                $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-warning edit_category_data"><i class="fas fa-user-edit text-white"></i></a>';
                return $output;
            } )->rawColumns( ['action'] )->make( true );

        }

        return view( 'backend.categories.index' );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'view.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $this->validate( $request, [
            'language_id' => 'required',
            'name'        => 'required',
        ] );

        Category::create( [
            'language_id' => $request->language_id,
            'parent_id'   => $request->parent_id,
            'name'        => $request->name,
            'slug'        => $this->getSlug( $request->name ),
            'description' => $request->description,
        ] );

        return response()->json( [
            'success' => 'Data added successfully ): ',
        ] );

    }

    /**
     * Display the specified resource.
     *
     * @param  \Category  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $data = Category::findOrFail( $id );
        return response()->json( $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Category  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        $data = Category::find( $id );
        return view( 'view.edit', [
            'data' => $data,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \User  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function updateCategory( Request $request ) {

        //get all data
        $id = $request->id;
        $language_id = $request->language_id;
        $parent_id = $request->parent_id;
        $name = $request->name;
        $description = $request->description;

        // check category has or not
        $data = Category::findOrFail( $id );

        if ( $data != NULL ) {
            $data->language_id = $language_id;
            $data->parent_id = $parent_id;
            $data->name = $name;
            $data->slug = $this->getSlug( $name );
            $data->description = $description;
            $data->update();

            return response()->json( [
                'success' => 'Data updated successfully ): ',
            ] );
        } else {
            return response()->json( [
                'error' => 'Data not found!',
            ] );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Category  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request ) {
        $data = Category::find( $request->id );
        if ( $data ) {

            $data->delete();

            return redirect()->back()->with( 'success', 'Data deleted successfully ): ' );
        } else {
            return redirect()->back()->with( 'error', 'Sorry, Not found data! ' );
        }
    }

    /**
     *
     *   Status update method
     */
    public function updateCategoryStatus( $id, $val ) {
        $data = Category::findOrFail( $id );

        if ( $val == 1 ) {
            $data->status = false;
            $data->update();
            return 'Data Inactive Succcessfully ): ';
        } else {
            $data->status = true;
            $data->update();
            return 'Data Active Succcessfully ): ';
        }

    }

    /**
     *
     *   Trash list page method
     */
    public function listCategoryTrash() {

        // check ajax request by yjra datatable
        if ( request()->ajax() ) {

            return datatables()->of( Category::where( 'trash', true )->latest()->get() )->addColumn( 'action', function ( $data ) {
                $output = '<form style="display: inline;" action="#" method="POST" id="category_delete_form"><input type="hidden" name="id" id="delete_category" value="' . $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-danger" ><i class="fa fa-trash"></i></button></form>';
                return $output;
            } )->rawColumns( ['action'] )->make( true );

        }

        return view( 'backend.categories.trash' );

    }

    /**
     *
     *   Trash update method
     */
    public function updateCategoryTrash( $id, $val ) {
        $data = Category::findOrFail( $id );

        if ( $val == 1 ) {
            $data->trash = false;
            $data->update();
            return 'Data Remove Trash Succcessfully ): ';
        } else {
            $data->trash = true;
            $data->update();
            return 'Data Trash Succcessfully ): ';
        }

    }

    /**
     * Category Delete
     */
    public function deleteByAjax( Request $request ) {

        $delete_id = $request->id;
        $data = Category::findOrFail( $delete_id );
        // return $data;

        try {

            if ( $data ) {

                $data->delete();
                return 'Data deleted successfully :) ';

            }

        } catch ( \Throwable$th ) {
            return 'Data deleted failed badly!';
        }

    }

}
