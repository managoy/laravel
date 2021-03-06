<?php

namespace App\Widgets;

use App\Company;
use App\Customer;
use Arrilot\Widgets\AbstractWidget;

class CustomerList extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * The number of seconds before each reload.
     *
     * @var int|float
     */
    public $reloadTimeout = 10;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //



        return view('widgets.customer_list', [
            'config' => $this->config,
            'customers' => $this->getData()

        ]);
    }

    public function getData(){
        //$companies = Customer::all(); //Blunder Mistake I had been adding all CUSTOMERS to a COMPANIES Variable ahhah!!!
        //dd($companies);
        //return $companies;
        $customers = Customer::with('company')->paginate(15);
        return $customers;
    }
}
