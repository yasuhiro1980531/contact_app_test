<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create(ContactRequest $request)
    {
        $inputs = $request->all();
        //$postcode = $inputs['postcode'];
        //if(isset($postcode)){
            //$result = mb_convert_kana($postcode, 'n');
            //return $result;
        //}
        return view('confirm',['inputs' => $inputs]);
        
    }

    public function add(ContactRequest $request)
    {
        $inputs = $request->except('action');
        $action = $request->input('action');
        if($action === 'back'){
            return redirect()
            ->route("contact")
            ->withInput($inputs);
        } else {
            Contact::create($inputs);
            return view('thanks');
        }
    }
}
