<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
      $contact = session('contact', [
        'last_name' => old('last_name', ''),
        'first_name' => old('first_name', ''),
        'gender' => old('gender', ''),
        'email' => old('email', ''),
        'tel-1' => old('tel-1', ''),
        'tel-2' => old('tel-2', ''),
        'tel-3' => old('tel-3', ''),
        'address' => old('address', ''),
        'building' => old('building', ''),
        'category_id' => old('category_id', ''),
        'detail' => old('detail', ''),
    ]);

      return view('index', compact('contact'));
    }

    public function confirm(Request $request)
    {
      $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel-1', 'tel-2', 'tel-3', 'address', 'building', 'category_id', 'detail']);
      session(['contact' => $contact]);
      return view('confirm', compact('contact'));
    }

    public function backToForm(Request $request)
    {
      return redirect('/')->withInput();
    }

    public function thanks(Request $request)
    {
      $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
      Contact::create($contact);
      return view('thanks');
    }

    public function admin(Request $request)
    {
      // $contacts = Contact::Paginate(4);
      // $received_contacts = Contact::with('category')->get();
      return view('admin');
      // return view('admin', ['contacts' => $contacts], 'received_contacts');
    }

    // $received_todos = Todo::with('category')->get();
    // $received_categories = Category::all();
    // return view('index', compact('received_todos', 'received_categories'));
}
