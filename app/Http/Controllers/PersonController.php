<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Person, Area};

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('people.index', [
            'people' => Person::paginate(10)
        ]);
    }

    public function create()
    {
        return view('people.create', [
            'person' => new Person(),
            'areas' => Area::get()
        ]);
    }

    public function store()
    {
        // Validate the request
        $new = $this->validateRequest();
        
        // Assign the foreign key
        $new['area_id'] = request('area');

        // Add new person
        $person = Person::create($new);

        // Generate a new code (9 uppercased letters of Name + 4 digits of ID )
        $name = strtoupper($new['name']);
        $name = str_replace(' ', '', $name);
        $name = substr($name, 0, 9);
        $name = str_pad($name, 9, '0');
        $id = str_pad($person['id'], 4, '0', STR_PAD_LEFT);
        $new['code'] = $name.$id;

        // Update the person with the generated code
        $person->update($new);

        session()->flash('success', 'Umat baru berhasil ditambahkan');

        return redirect(route('people'));
    }

    public function edit(Person $person)
    {
        return view('people.edit', [
            'person' => $person,
            'areas' => Area::get()
        ]);
    }

    public function update(Person $person)
    {
        // Validate the request
        $new = $this->validateRequest();
        
        // Assign the foreign key
        $new['area_id'] = request('area');

        $person->update($new);

        session()->flash('success', 'Data umat berhasil diperbarui');

        return redirect(route('people'));
    }

    public function delete(Person $person)
    {
        $person->delete();

        session()->flash('success', 'Data umat berhasil dihapus');

        return redirect(route('people'));
    }

    public function scan(Person $person)
    {
        return response()->json($person);
    }

    public function validateRequest()
    {
        return request()->validate([
            'name' => 'required|alpha',
            'address' => 'required'
        ]);
    }
}
