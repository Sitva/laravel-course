<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class listingcontroller extends Controller
{
    //Show all listings
    public function index() {
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    //Single listings
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Show Create Form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request) {
      $formFields = $request->validate([
          'title' => 'required',
          'company' => ['required', Rule::unique('listings', 'company')],
          'location' => 'required',
          'website' => 'required',
          'email' => ['required', 'email'],
          'tags' => 'required',
          'description' => 'required'
      ]);

      if($request->hasFile('logo')) {
        $formfields['logo'] = $request->file('logo')->store('logos', 'public');
      }

      Listing::create($formFields);

      

      return redirect('/')->with('message', 'Listing created successfully!');
    }

    //Show Edit Form
    public function edit(Listing $listing) {
        dd($listing);
      return view('listings.edit', ['listings' => $listing]);
    }
}
