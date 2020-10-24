<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CrudController extends Controller
{


    public function __construct()
    {
    }
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

    public function create(REQUEST $req)
    {


        //check if method is post or get

        if ($req->isMethod('get')) {
            // if method is get :
            return view('Offers/create');
        }
        if ($req->isMethod('post')) {
            // if method is post :
            //validate data before insert to DB
        
            $validator = FacadesValidator::make($req->all(), $this->getRules(), $this->getMessages());

            if ($validator->fails()) {
                //return dd($validator->errors());
                return redirect()->back()->withErrors($validator)->withInput($req->all());
                //or
                //return view('Offers.create')->withErrors($validator)->withInput($req->all());

            }
             else {
                 //insert to database
                Offer::create([
                    'name' => $req->name,
                    'price' => $req->price,
                    'details' => $req->details

                ]);
                
                return view('Offers.create');
            }
        }
    }
    public function getRules()
    {

        return  $rules = [

            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required'
        ];
    }
    public function getMessages()
    {
        return $messages = [

            'name.required' => 'اسم العرض  مطلوب',
            'name.unique' => "الاسم موجود مسبقا",
            'price.required' => 'السعر مطلوب',
            'details.required' => 'التفاصيل مطلوبه'
        ];
    }
}