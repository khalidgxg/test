<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use resources\lang;
use App\Models\Offer;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CrudController extends Controller
{


    public function __construct()
    {
    }

// tow ways:
//First by Create Requsest (php artisan make:request OfferRequest) ,then all rules and messages are placed in it
    public function Createget()
    {

        return view('Offers/create');
    }


    public function Createpost(OfferRequest $req)
    {
        Offer::create([
            'name' => $req->name,
            'price' => $req->price,
            'details' => $req->details

        ]);

        return redirect()->back()->with(['succ' => "تم اضافة العرض بنجاح"]);
    }













//second we make all validation and rules herem:





    // public function getOffers()
    // {

    //     // return Offer::select('name')->get();
    //     return Offer::get();
    // }
    // public function store()
    // {
    //     $create =
    //         [
    //             'name' => 'khalidTaher',
    //             'price' => '1000',
    //             'details' => 'lorem'
    //         ];

    //     return Offer::create($create);
    // }

    // public function create(OfferRequest $req)
    // {


    //     //check if method is post or get

    //     if ($req->isMethod('get')) {
    //         // if method is get :
    //         return view('Offers/create');
    //     }
    //     if ($req->isMethod('post')) {
    //         // if method is post :
    //         //validate data before insert to DB

    //        // $validator = FacadesValidator::make($req->all(), $this->getRules(), $this->getMessages());

    //         // if ($validator->fails()) {
    //         //     //return dd($validator->errors());
    //         //     return redirect()->back()->withErrors($validator)->withInput($req->all());
    //         //     //or
    //         //     //return view('Offers.create')->withErrors($validator)->withInput($req->all());

    //         // }
    //         // else {
    //              //insert to database
    //             Offer::create([
    //                 'name' => $req->name,
    //                 'price' => $req->price,
    //                 'details' => $req->details

    //             ]);

    //             return redirect()->back()->with(['succ'=>"تم اضافة العرض بنجاح"]);
    //       //  }
    //     }
    // }
    // public function getRules()
    // {

    //     return  $rules = [

    //         'name' => 'required|max:100|unique:offers,name',
    //         'price' => 'required|numeric',
    //         'details' => 'required'
    //     ];
    // }
    // public function getMessages()
    // {
    //     return $messages = [
    //                            //اما نكتب تران او 2 اندر سكول وكله واحد
    //         'name.required' =>__('Messages.offerNameRequired'),
    //         'name.unique' => trans('Messages.offerNameUnique'),
    //         'price.required' => __('Messages.PriceRequired'),
    //         'price.numeric' => trans('Messages.PriceNumeric'),
    //         'details.required' => __('Messages.DetailsRequired')
    //     ];
    // }
}
