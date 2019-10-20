<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Http\Requests\StoreCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{

    private $customer;
    public function __construct()
    {
        //middleware allow the user to only use the index method without login
        //$this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $customers = Customer::all();
//        $activeCustomers = Customer::active()->get();
//        $inactiveCustomers = Customer::inactive()->get();
//
//        return view('internal.customers', [
//            'activeCustomers' => $activeCustomers,
//            'inactiveCustomers' => $inactiveCustomers,
//        ]);

        // dd($customers);
        return view('customers.index', compact('customers'));
    }


    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store(StoreCustomer $request)
    {

       // $data = $request->validated();
        DB::transaction(function () use ($request){
            $data = $request->data();
            $this->customer = Customer::create($data);

            $this->storeImage($customer);
        });

        event(new NewCustomerHasRegisteredEvent($this->customer));


        //Register to NewsLetter
        //dump('Registered to newsletter');
        //Slack Notification to Admin
        //dump('Slack message here');
        /*
        //without using create($data)
        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->active = request('active');
        $customer->save();
        */
        return redirect('customers');
    }

    public function show(Customer $customer)
    {

        //without route model binding
        //$customer = Customer::find($customer);
        //$customer = Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {

        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer, StoreCustomer $request)
    {
        //$data = $request->validated();
        $data =$request->data();
        $customer->update($data);
        $this->storeImage($customer);
        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {

        $customer->delete();
        return redirect('customers');
    }

    private function ValidateRequest()
    {

//        return request()->validate([
//            'name' => 'required|min:3',
//            'email' => 'required|email',
//            'active' => 'required',
//            'company_id' => 'required'
//        ]);


//        $validateData = request()->validate([
//            'name' => 'required|min:3',
//            'email' => 'required|email',
//            'active' => 'required',
//            'company_id' => 'required'
//        ]);
//
//        if(request()->hasFile('image')){
//            \request()->validate([
//                'image' =>'file|image|max:5000',
//            ]);
//        }
//
//        return $validateData;

        //Using Tap
        return tap(request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'

        ]), function () {

            if (request()->hasFile('image')) {
                \request()->validate([
                    'image' => 'file|image|max:5000',
                ]);

            }
        });
    }

    private function storeImage($customer)
    {

        if (request()->has('image')) {

            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $customer->image))->fit(300,300);

            $image->save();

        }
    }
}
