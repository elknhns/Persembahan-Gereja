<?php

namespace App\Exports;

use App\Offering;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OfferingsExport implements FromView
{
    public function view(): View
    {
        return view('exports.offerings', [
            'offerings' => Offering::all()
        ]);
    }
}