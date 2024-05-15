<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


// class ProductsImport implements ToModel,WithHeadingRow  //WithHeadingRow is used for headings in excel file
// {
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)    //for without headings excel file
    // {
    //     if(!empty($row[0])) {
    //         return new Product([
    //             'name' => $row[0],
    //             'description' => $row[1],
    //             'qty' => $row[2]
    //         ]);
    //     }
        
    // }

    // public function model(array $row)  //for with headings excel file
    // {
    //     return new Product([
    //         'name' => $row['name'],
    //         'description' => $row['description'],
    //         'qty' => $row['qty']
    //     ]);
    // }






    
    class ProductsImport implements ToCollection,WithHeadingRow {

    //for updating the data and adding new data we need to use ToCollection 
        public function collection(Collection $rows)    
        {
            foreach ($rows as $row) 
            {
                $product = Product::find($row['id']);
                if (!empty($product)) {
                    $product->name = $row['name'];
                    $product->description = $row['description'];
                    $product->qty = $row['qty'];
                    $product->save();
                } else {
                    $product = new Product;
                    $product->name = $row['name'];
                    $product->description = $row['description'];
                    $product->qty = $row['qty'];
                    $product->save();
                }
            }
        }
    
    }
// }
