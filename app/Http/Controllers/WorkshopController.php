<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    // แสดงฟอร์ม
    public function index()
    {
        return view('template.html101');
    }

    // รับค่าจากฟอร์ม
    public function store(Request $request)
    {
        return view('template.result', [
            'fname'      => $request->fname,
            'lname'      => $request->lname,
            'birthdate' => $request->birthdate,
            'age'        => $request->age,
            'gender'     => $request->gender,
            'address'    => $request->address,
            'color'      => $request->color,
            'music'      => $request->music,
        ]);
    }
}
