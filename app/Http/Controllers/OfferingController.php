<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Offering, Person};

class OfferingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('offerings.index', [
            'offerings' => Offering::paginate(10)
        ]);
    }

    public function create()
    {
        return view('offerings.create', [
            'offering' => new Offering()
        ]);
    }

    public function store()
    {
        // Validate the request
        $new = $this->validateRequest();

        // Add new offering
        $offering = Offering::create($new);

        // Generate a new code (13 digits of the person's ID + 4 digits of ID )
        $new['code'] = request('barcode').str_pad($offering['id'], 4, '0', STR_PAD_LEFT);

        // Update the person with the generated code
        $offering->update($new);

        session()->flash('success', 'Data persembahan berhasil ditambahkan');

        return redirect(route('offerings'));
    }

    public function edit(Offering $offering)
    {
        return view('offerings.edit', [
            'offering' => $offering,
            'people' => Person::get(),
            'mode' => 'edit'
        ]);
    }

    public function update(Offering $offering)
    {
        // Validate the request
        $new = $this->validateRequest();

        $offering->update($new);

        session()->flash('success', 'Data persembahan berhasil diubah');

        return redirect(route('offerings'));
    }

    public function delete(Offering $offering)
    {
        $offering->delete();

        session()->flash('success', 'Data persembahan berhasil diubah');

        return redirect()->back();
    }

    public function validateRequest()
    {
        return request()->validate([
            'person_id' => 'required',
            'value' => 'required'
        ]);
    }
}