<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $current_user=auth()->user();
        $contacts=Contact::all();
        return view('contacts.index')
        ->with('contacts',$contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact=new Contact($request->all());
        $contact->save();
        return redirect()
        ->route('contacts.index')
        ->with('success','مخاطب مورد نظر اضافه شد');
    }

    public function addContact(ContactRequest $request)
    {
        $contact=new Contact($request->all());
        $contact->save();
        return back();
    }

    public function addPhone(Request $request, Phone $phone)
    {
        try {
            $phone=new Phone($request->all());
            foreach ($phones as $phone) {
                $phone->contact_id="1";
                $phone->save();
            }
        } catch (Exception $e) {
            return $e;
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show')
        ->with('contact',$contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contacts=Contact::all();
        return view('contacts.edit')
        ->with('contact',$contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->fill($request->only(['name','family','father_name','phone']));
        $contact->save();
        return redirect()->route('contacts.index')
        ->with('primary','مخاطب مورد نظر ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        // $contact->delete();
        // return redirect()->route('contacts.index')
        // ->with('danger','مخاطب مورد نظر حذف شد');
    }

    public function delete($id)
    {
        $serv_contact = Contact::findOrFail($id);
        $serv_contact->delete();
        return response()->json(['status' => 'رکورد با موفقیت حذف شد']);
    }
}
