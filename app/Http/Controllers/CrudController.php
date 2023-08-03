<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{

    public function index()
    {
//        $offers=Offer::select('*')->get();
        $offers=Offer::select('id', 'price',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'details_' .LaravelLocalization::getCurrentLocale(). ' as details')
            ->get();
//      $offers=Offer::all();
        return view('offers.index',compact('offers'));
    }

    public function create()
    {
        return view('offers.create');
    }


    public function store(OfferRequest $request)
    {

        //validate data before insert to database
//  $rules = $this->getRules();
//  $messages = $this->getMessages();
//   $validator = Validator::make($request->all() ,$rules, $messages);
//   if ($validator->fails()) {
//      return redirect()->back()->withErrors($validator)->withInputs($request->all());
//   }
//
        Offer::create([
        'name_ar' => $request->name_ar,
        'name_en' => $request->name_en,
        'price' =>  $request->price,
        'details_ar' => $request->details_ar,
        'details_en' => $request->details_en,
        ]);

        return redirect()->back()->with(['success' => __('messages.Offer Had been Added')]);
    }

//        public function getMessages()
//        {
//
//            return $messages = [
//                'name.required' => __('messages.offer name required'),
//                'name.unique' => trans('messages.offer name must be unique'),
//                'price.required' => trans('messages.offer price required'),
//                'price.numeric' => trans('messages.offer price must be numeric'),
//                'details.required' => __('messages.offer details required'),
//            ];
//        }

//        protected function getRules()
//        {

//            return $rules = [
//                'name' => 'required|max:100|unique:offers,name',
//                'price' => 'required|numeric',
//                'details' => 'required',
//            ];
//        }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
