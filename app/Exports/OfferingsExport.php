<?php

namespace App\Exports;

use App\Offering;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OfferingsExport implements FromView
{
        public function __construct($dateStart, $dateEnd)
    {
        // dd($dateEnd);
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }
    
    public function view(): View
    {
        return view('exports.offerings', [
            'offerings' => Offering::whereBetween('created_at', [$this->dateStart.' 00:00:00', $this->dateEnd.' 23:59:59'])->get(),
            'dateStart' => $this->dateStart,
            'dateEnd' => $this->dateEnd
        ]);
    }
}