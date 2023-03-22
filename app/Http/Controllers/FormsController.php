<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function all(Request $request)
    {
        $date_filter = $request->date;

        if (empty($date_filter))
        {
            return Form::scan();
        }

        return Form::all()->whereBetween('created_at', [$date_filter . ' 00:00:00', $date_filter . ' 23:59:59']);
    }

    public function get($cik)
    {
        return Form::find($cik);
    }

    public function post(Request $request)
    {
        return Form::create([
            'sec_document' => $request->input('sec_document'),
            'cik' => $request->input('cik'),
            'form' => $request->input('form'),
            'date' => $request->input('date'),
            'xml' => $request->input('xml'),
        ]);
    }
}
