<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

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
    $received_categories = Category::all();

      return view('index', compact('contact', 'received_categories'));
    }

    
    public function confirm(ContactRequest $request)
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
      $received_contacts = Contact::Paginate(7);
      $received_categories = Category::all();
      
      return view('admin', compact('received_contacts', 'received_categories'));
    }


    public function search(Request $request)
    {
      $query = Contact::with('category');
      if ($request->filled('name_or_email')) {
          $query->keywordSearch($request->name_or_email);
      }
      if ($request->filled('gender')) {
          $query->genderSearch($request->gender);
      }
      if ($request->filled('category_id')) {
          $query->categorySearch($request->category_id);
      }
      if ($request->filled('created_at')) {
        $query->dateSearch($request->created_at);
    }
  
      $received_contacts = $query->paginate(7)->appends($request->all());
      
      $received_categories = Category::all();
      
      return view('admin', compact('received_contacts', 'received_categories'));
    }   
    
    
    public function reset(Request $request)
    {
      $received_contacts = Contact::Paginate(7);
      $received_categories = Category::all();
      
      return redirect('/admin');
    }
}
