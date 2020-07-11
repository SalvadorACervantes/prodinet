<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SaveUserRequest;
use Auth;
use Image;
use App\User;
use App\BillingInformation;
use App\Address;
class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_billing =$user->BillingInformation()->first();
        $user_address = $user->UserAddress()->first();
        if($user_address){
            $province=DB::table('province')->select('name')->where('id',$user_address->province)->first();
        }else{
            $province=null;
        }

        return view('account.index', [
              'user' => $user,
              'billing' => $user_billing,
              'address' => $user_address,
              'province' => $province,
        ]);
    }

    public function create_billing()
    {
        return view ('account.create_billing');
    }

    public function store_billing(Request $request)
    {
        $billing = new BillingInformation;
        $billing->user_id = Auth::user()->id;
        $billing->business_name =$request->business_name;
        $billing->rfc= $request->rfc;
        $billing->save();
        return back()->with('toast_success', 'Registro exitoso');
    }

    public function edit_billing(){
        $user =Auth::user();
        $user_billing=$user->BillingInformation()->get();
        return view('account.update_billing',['billing' => $user_billing]);
    }

    public function update_billing($id,Request $request){
        $billing= BillingInformation::findOrFail($id);
        return $billing;
    }

    public function update_image(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       // Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatars/'. $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return  back();
    }

     public function edit_name()
    {
        //
        $user = Auth::user();
        return view('account.edit_account',[
            'user' => $user,
        ]);
    }

    public function update_name(Request $request){
        $this->validate(request(),[
            'name' => 'required|min:3',
            'lastname' => 'required|min:3'
        ],[
            'name.required' => 'Revisa este dato',
            'lastname.required' => 'Revisa este dato'
        ]);
        $user=Auth::user();
        $user->name =$request->name;
        $user->lastname =$request->lastname;
        $user->save();
        //return view('account.index' ,['user' => $user]);
        return back()->with('toast_success', 'Actualización aplicada');
    }

    public function edit_phone()
    {
        //
        $user = Auth::user();
        return view('account.edit_phone',[
            'user' => $user,
        ]);
    }

    public function update_phone(Request $request){
        $this->validate(request(),[
            'phone' => 'required|digits:10',
        ]);
        $user= Auth::user();
        $user->telephone = $request->phone;
        $user->save();
        //return view('account.index' ,['user' => $user]);
        return back()->with('toast_success', 'Actualización aplicada');
    }

    public function create_address(){
        $province_name=DB::table('province')->select('id','name')->get();
        return view('account.create_address',['pro_name' => $province_name]);
    }

    public function store_address(Request $request){
        $this->validate(request(),[
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'postcode' => 'required|digits:5',
            'city' =>'required|string',
            'province' => 'required',
            'suburb' => 'required|string',
            'street' => 'required|string',
            'ext_number' =>'required|numeric',
            'int_number' =>'numeric|nullable',
            'street_1' => 'string|nullable',
            'street_2'=> 'string|nullable',
            'additional' => 'string|nullable'
        ]);

        $address = new Address;
        $address->user_id= Auth::user()->id;
        $address->name = $request->name;
        $address->lastname = $request->lastname;
        $address->postcode = $request->postcode;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->suburb = $request->suburb;
        $address->street = $request->street;
        $address->ext_number =$request->ext_number;
        $address->int_number =$request->int_number;
        $address->street_1 = $request->street_1;
        $address->street_2 = $request->street_2;
        $address->additional = $request->additional;
        $address->save();
        return redirect('/account')->with('toast_success', 'Direccion de envio agregada');
    }

    public function edit_address(){
        $user = Auth::user();
        $address =$user->UserAddress()->first();
        $province=DB::table('province')->select('id','name')->get();
        return view('account.update_address',[
            'address' => $address,
            'user' => $user,
            'pro_name' => $province,
        ]);
    }

    public function update_address($id,Request $request){

        $address = Address::findOrFail($id);
        $address->user_id= Auth::user()->id;
        $address->name = $request->name;
        $address->lastname = $request->lastname;
        $address->postcode = $request->postcode;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->suburb = $request->suburb;
        $address->street = $request->street;
        $address->ext_number =$request->ext_number;
        $address->int_number =$request->int_number;
        $address->street_1 = $request->street_1;
        $address->street_2 = $request->street_2;
        $address->additional = $request->additional;
        $address->save();
        return redirect('/account')->with('toast_success', 'Direccion de envio actualizada');
    }

    public function destroy($id)
    {
        //
    }
}
