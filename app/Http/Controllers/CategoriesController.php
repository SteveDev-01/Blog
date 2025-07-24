<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{


    public function create(Request $request){
        $category = new Category();
        $category->create ([
            'name' => $request->name,
            'created_by'=> auth()->user()->id,
        ]);
        return redirect('/admin');
    }
    public function del_category($id)
    {

        $category = Category::find($id);

        if (!$category) {
            return redirect('/admin')->with('error', 'Kategorie nicht gefunden.');
        }

        $category->delete();

        return redirect('/admin')->with('success', 'Kategorie gelöscht.');
    }


}
