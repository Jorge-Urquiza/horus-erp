<?php

namespace App\Actions;

use App\Models\BranchsProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Support\Facades\Log;

class StoreSaleAction
{
    private $request;

    private $branch_products;

    private $products;

    private $sale_prices;

    private $quantities;

    private $discounts; //& descuentos por productos

    private $subtotals; // precio * cantidad (sin aplicar descuento)

    private $totals; //precio * cantidad (aplicando descuento)

    private $length;

    private $sale;


    public  function __construct($request)
    {
        $this->request = $request;

        $this->init();
    }


    public function execute() :void
    {


            $this->sale = Sale::create($this->matchSaleData());

            for ($index = 0; $index < $this->length; $index++) {

                $detail = $this->matchDetailData($index);

                SaleDetail::create($detail);

                $this->updateStock($index);
            }

    }


    private function updateStock($index) :void
    {
        $product = Product::findOrFail($this->products[$index]);

        $branchProduct = BranchsProduct::findOrFail($this->branch_products[$index]);

        $quantity = $this->quantities[$index];

        $product->decrement('total_current_stock', $quantity);

        $branchProduct->decrement('current_stock', $quantity);
    }
    private function matchSaleData() : array
    {
        $current_user = auth()->user();

        $data = [];

        $data['nit'] = $this->request['nit']?? 0;

        $data['date'] = $this->request['date'];

        $data['subtotal'] = $this->request['totales_input'];

        $data['discount'] = $this->request['discount-neto-input'];

        $data['total_amount'] = $this->request['total-neto-input'];

        $data['branch_office_id'] = $current_user->branch_office_id;

        $data['user_id'] = $current_user->id;

        $data['customer_id'] = $this->request['customer_id'];

        return $data;
    }

    private function matchDetailData($index) : array
    {
        $data = [];

        $data['product_id'] = $this->products[$index];

        $data['quantity'] = $this->quantities[$index];

        $data['sale_price'] = round($this->sale_prices[$index], 2);

        $data['subtotal'] = $this->subtotals[$index];

        $data['discount'] = $this->discounts[$index];

        $data['total'] = $this->totals[$index];

        $data['sale_id'] = $this->sale->id;

        return $data;
    }

    private function init() : void
    {
        // dailts
        $this->branch_products = $this->request['branch_products_ids'];

        $this->products = $this->request['producto_id'];

        $this->quantities = $this->request['cantidad'];

        $this->sale_prices = $this->request['pcompra'];

        $this->length = count($this->products);

        $this->subtotals = $this->request['subtotals'];

        $this->discounts = $this->request['pdescuento'];

        $this->totals = $this->request['ptotal'];
    }
}
