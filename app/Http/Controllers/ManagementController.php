<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;


class ManagementController extends Controller
{
    //
    public function show(Request $request)
    {
        $fullname = $request['fullname'];
        $gender = $request['gender'];
        $email = $request['email'];
        $start = $request['start'];
        $end = $request['end'];
        $query = Contact::query();
        $inputs = Contact::doSearch($fullname, $email,$gender,$start,$end);
        return view('management',compact('inputs'));
    }

    public function delete(Request $request)
    {
        $id = $request['id'];
        Contact::destroy($id);
        \Session::flash('delete.success','お問い合わせを削除しました。');
        return redirect(route('management'));
    }
}
