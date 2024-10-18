<?php


namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class listingController extends Controller
{
  //

  public function index()
  {
    return view('listing.index', [
      'listings' => Listing::latest()->filter(request(['tag', 'search']))->Paginate(4)
    ]);
  }

  public function show(Listing $listing)
  {
    return view('listing.show', [
      'listing' => $listing
    ]);
  }

  public function create()
  {
    return view('listing.create');
  }

  public function store(Request $request): RedirectResponse
  {
    // dd($request->file('logo'));
    // Valider les champs du formulaire
    $formfield = $request->validate([
      'title' => 'required',
      'tags' => 'required',
      'company' => 'required',
      'email' => ['required', 'email'],
      'location' => 'required',
      'website' => 'required|url',
      'description' => 'required'
    ]);
    if ($request->hasFile('logo')) {
      $formfield['logo'] = $request->file('logo')->store('logos', 'public');
    }
    $formfield['user_id']=Auth::id();;

    Listing::create($formfield);
    return redirect('/')->with('message', 'Listing created successfully!');
  }


  // update & edit 
  public function edit(Listing $listing)
  {
   return view('listing.edit', ['listing' => $listing]);
  }





  public function update(Request $request, Listing $listing): RedirectResponse
  {
    // dd($request->file('logo'));
    // Valider les champs du formulaire
    $formfield = $request->validate([
      'title' => 'required',
      'tags' => 'required',
      'company' => 'required',
      'email' => ['required', 'email'],
      'location' => 'required',
      'website' => 'required|url',
      'description' => 'required'
    ]);
    if ($request->hasFile('logo')) {
      $formfield['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $listing->update($formfield);
    return back()->with('message', 'Listing updated successfully !');
  }
  public function destroy(Listing $listing)
  {
    $listing->delete();
    return redirect('/')->with('message',"Listing deleted successfully !");
  }
}
