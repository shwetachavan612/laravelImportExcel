<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index() {
        $products =Product::all();  //
        return view('import',compact('products'));      //
        // return view('import');
    }


    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()->back()->with('success', 'File imported successfully!');
    }
}
