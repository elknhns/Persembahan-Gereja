<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        return view('areas.index', ['areas' => Area::paginate(10)]);
    }
    
    public function show(Area $area)
    {
        $people = $area->people()->paginate(10);
        return view('people.index', compact('people', 'area'));
    }

    public function create()
    {
        $new = $this->validateRequest();
        $new['slug'] = \Str::slug($new['name']);

        Area::create($new);

        session()->flash('success', 'Lingkungan baru berhasil ditambahkan');

        return redirect()->back();
    }

    public function delete(Area $area)
    {
        $area->delete();
        
        session()->flash('success', 'Lingkungan berhasil dihapus');

        return redirect()->back();
    }

    public function validateRequest()
    {
        return request()->validate([
            'name' => 'required|alpha|min:4'
        ]);
    }
}
