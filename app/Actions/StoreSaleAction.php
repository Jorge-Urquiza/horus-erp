<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\SaleDetail;

class StoreSaleAction
{
    private $request;

    private $quantities;

    private $sale_prices;

    private $products;

    private $discounts;

    private $length;

    private $sale;

    public  function __construct($request)
    {
        $this->request = $request;

        $this->init();
    }


    public function execute() :void
    {
        DB::beginTransaction();

        try {

            $this->sale = Sale::create($this->matchSaleData());

            for ($index = 0; $index < $this->length; $index++) {

                $detail = $this->matchDetailData($index);

                SaleDetail::create($detail);
            }

            $this->sale->update(['total_amount' => $this->total]);

            DB::commit();

        }catch(\Exception $e){

            DB::rollback();

            flash()->error('Se ha producido un error, intente de nuevo, presione CTRL + F5 ');
        }
    }

    private function matchSaleData() : array
    {
        $current_user = auth()->user();

        $data = [];

        $data['total_amount'] = $this->total;

        $data['nit'] = $this->request['nit'];

        $data['date'] = $this->request['date'];

        $data['branch_office_id'] = $current_user->branch_office_id;

        $data['user_id'] = $current_user->id;

        $data['customer_id'] = $this->request['customer_id'];

        return $data;
    }

    private function matchDetailData($index) : array
    {
        $data = [];

        $data['quantity'] = $this->quantities[$index];

        $data['product_id'] = $this->products[$index];

        $data['sale_price'] = round($this->sale_prices[$index], 2);

        $data['sale_id'] = $this->sale->id;

        $data['subtotal'] = round($data['quantity'] * $data['sale_price'], 2);

        $data['discount'] = round($this->discounts[$index], 2);

        $data['total'] = round($data['subtotal'] -  $data['discount'], 2);

        $this->total += + round($data['total'], 2);

        return $data;
    }

    private function init() : void
    {
        $this->quantities = $this->request['cantidad'];

        $this->products = $this->request['producto_id'];

        $this->sale_prices = $this->request['pcompra'];

        $this->discounts = $this->request['pdescuento'];

        $this->length = count($this->request['producto_id']);

        $this->total = 0;
    }
}
