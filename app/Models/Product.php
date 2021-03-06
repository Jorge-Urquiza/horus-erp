<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\Traits\LogsActivity;

class Product extends Model
{
    use LogsActivity;

    protected $casts = [
        'gain' => 'float',
        'cost' => 'float',
        'price' => 'float',
    ];

    public static function getProducto($id)
    {
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

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function measurementsUnit()
    {
        return $this->belongsTo(MeasurementsUnits::class, 'measurements_units_id');
    }

    public static function incrementarStock($id, $cantidad){
        $stock_product = Product::find($id);
        $stock_product->current_stock = $stock_product->current_stock + ($cantidad * 1);
        $stock_product->update();
    }

    public static function decrementarStock($id, $cantidad){
        $stock_product = Product::find($id);
        $stock_product->current_stock = $stock_product->current_stock - ($cantidad * 1);
        $stock_product->update();
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')
            ->withDefault([
                'name' => 'Sin categoria',
            ]);
    }
    public function BranchsProduct()
    {
        return $this->hasMany(BranchsProduct::class);
    }

}
