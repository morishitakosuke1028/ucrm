<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Inertia\Inertia;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Mail\ContactsSendmail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Contacts/Index', [
            'contacts' => Contact::select('id', 'name', 'company', 'status', 'created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Contacts/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        Contact::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'work' => $request->work,
            'company' => $request->company,
            'content' => $request->content,
            'member' => $request->member,
            'status' => $request->status,
        ]);

        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'content' => $request->content,
            'member' => $request->member,
        ];
        try {
            \Mail::send(new ContactsSendmail($params)); // メール送信
        } catch (\Exception $e) {
            throw $e;
        }
        return to_route('contacts.thanks');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/Edit', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->status = $request->status;
        $contact->save();
        return to_route('contacts.index')
        ->with([
            'message' => '更新しました。',
            'status' => '成功しました。',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return to_route('contacts.index')
        ->with([
            'message' => '削除しました。',
            'status' => 'danger',
        ]);
    }

    public function thanks()
    {
        return Inertia::render('Contacts/Thanks');
    }
}
