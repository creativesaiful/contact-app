<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Ward;
use Brian2694\Toastr\Facades\Toastr;


class ContactController extends Controller
{

    public function index(){

        $contacts = Contact::orderBy('id', 'desc')->get();

 

        return view ('pages.contacts.index', compact('contacts'));
    }
    public function create()
    {
    
        $districts = District::orderBy('name', 'asc')->get();
        $upazilas = Upazila::where('district_id', 14)->orderBy('id', 'asc')->get(); 
        return view('pages.contacts.create', compact('districts', 'upazilas'));
    }


    public function store(Request $request){
        

       
        $validated = $request->validate([
            'district_id' => 'required',
            'name' => 'required',
            'contact_number_1' => 'required | digits:11 | unique:contacts,contact_number_1',
        ]);

        Contact::create([
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'union_id' => $request->union_id,
            'ward_id' => $request->ward_id,
            'name' => $request->name,
            'bangla_name' => $request->bangla_name,
            'contact_number_1' => $request->contact_number_1,
            'contact_number_2' => $request->contact_number_2,
            'address' => $request->address,
            'profession' => $request->profession,
            'category_id' => $request->category_id,
            'batch_id' => $request->batch_id,
            's_s_c_batch_id' => $request->s_s_c_batch_id,
            'comments' => $request->comments,
        ]);


        Toastr::success('Contact added successfully', 'Success');

        return redirect()->route('contacts');


    }


    public function edit($id){

        $contact = Contact::find($id);

        $districts = District::orderBy('name', 'asc')->get();
        $upazilas = Upazila::where('district_id', $contact->district_id)->orderBy('name', 'asc')->get(); 
        $unions = Union::where('upazila_id', $contact->upazila_id)->orderBy('name', 'asc')->get();
        return view('pages.contacts.edit', compact('contact', 'districts', 'upazilas', 'unions'));


    }

    public function update(Request $request, $id){
        
        $validated = $request->validate([
            'district_id' => 'required',
            'name' => 'required',
            'contact_number_1' => 'required | digits:11 | unique:contacts,contact_number_1,' . $id,
        ]);

        $contact = Contact::find($id);

        $contact->update([
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'union_id' => $request->union_id,
            'ward_id' => $request->ward_id,
            'name' => $request->name,
            'bangla_name' => $request->bangla_name,
            'contact_number_1' => $request->contact_number_1,
            'contact_number_2' => $request->contact_number_2,
            'address' => $request->address,
            'profession' => $request->profession,
            'category_id' => $request->category_id,
            'batch_id' => $request->batch_id,
            's_s_c_batch_id' => $request->s_s_c_batch_id,
            'comments' => $request->comments,

        ]);

        Toastr::success('Contact updated successfully', 'Success');

        return redirect()->route('contacts');
    }


    public function destroy($id){

        $contact = Contact::find($id);

        $contact->delete();

        Toastr::error('Contact deleted successfully', 'Success');

        return redirect()->route('contacts');


    }

    public function filter(Request $request)
{
    $contacts = Contact::query();

    $upazilas = Upazila::query();

    $unions = Union::query();

    $wards = Ward::query();

    if (!empty($request->district_id)) {
        $contacts->where('district_id', $request->district_id);
        $upazilas = Upazila::where('district_id', $request->district_id)->orderBy('name', 'asc')->get();
    }

    if (!empty($request->upazila_id)) {
        $contacts->where('upazila_id', $request->upazila_id);
        $unions = Union::where('upazila_id', $request->upazila_id)->orderBy('name', 'asc')->get();
    }

    if (!empty($request->union_id)) {
        $contacts->where('union_id', $request->union_id);
       
    }

    if (!empty($request->ward_id)) {
        $contacts->where('ward_id', $request->ward_id);
    }

    if(!empty($request->category_id)){

        $contacts->where('category_id', $request->category_id);
    }
    if(!empty($request->batch_id)){
        $contacts->where('batch_id', $request->batch_id);
    }
    if(!empty($request->s_s_c_batch_id)){
        $contacts->where('s_s_c_batch_id', $request->s_s_c_batch_id);
    }

    // Fetch filtered contacts
    $contacts = $contacts->orderBy('id', 'desc')->get();

    // Fetch districts and upazilas for dropdowns
    $districts = District::orderBy('name', 'asc')->get();
    

    return view('pages.contacts.filter', compact('contacts', 'districts', 'upazilas', 'unions', 'wards'));
}

}
