<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public static function getProducto($id) {

        $data = DB::table('products')->select(['products.id','products.local_code', 'products.name', 'products.price',
            'products.description', 'products.image',
            'categories.name as categoria', 'brands.name as marca', 'suppliers.name as proveedor','uni.name as unidad'])
            ->leftJoin('categories','categories.id','=','products.category_id')
            ->leftJoin('suppliers','suppliers.id','=','products.supplier_id')
            ->leftJoin('brands','brands.id','=','products.brand_id')
            ->leftJoin('measurements_units as uni','uni.id','=','products.measurements_units_id')
            ->where('products.id', '=', $id)->get();
        return $data[0];
    }
    
    public static function getBase64($imagen)
    {
        $path = $imagen->getRealPath();
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
}
