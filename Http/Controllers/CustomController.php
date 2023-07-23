<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class CustomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $contact = Contact::first();
        return view('admin.custom.index', compact('contact'));
    }

    public function edit($id){
        Contact::find($id);
        $contacts = Contact::all();
        return view('admin.custom.edit', compact('contacts'));
    }

    public function update(Request $request, $id){
        // Validasi data yang dikirimkan melalui request
        $request->validate([
            'alamat' => 'required',
            'email' => 'required|email',
            'kontak' => 'required',
        ]);

        // Temukan contact berdasarkan ID
        $contact = Contact::findOrFail($id);

        // Update atribut alamat, email, dan kontak
        $contact->update([
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'kontak' => $request->input('kontak'),
        ]);

        return redirect()->route('custom.index')->with('success', 'Contact berhasil diperbarui.');
    }
}
