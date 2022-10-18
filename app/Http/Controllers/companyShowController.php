<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;

class companyShowController extends Controller
{
    public function companyShow($id)
    {
        $firmy = company::where('id_firma',$id)->first();

        return view('companyShow', [
            'siteNameTittle' => 'Kontakty',
            'firmy' => $firmy,
        ]);
    }
}
