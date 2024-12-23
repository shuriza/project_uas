<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function table(Request $request)
    {
        // Query awal
        $pesanan = \App\Models\Pesanan::query();
    
        // Filter berdasarkan status jika diisi
        if ($request->has('status') && $request->status != '') {
            $pesanan->where('status', $request->status);
        }
    
        // Paginasi
        $pesanan = $pesanan->paginate(10);
    
        // Return ke view
        return view('layouts.table-example', compact('pesanan'));
    }
    
    
    
    

    public function clock()
    {
        return view('layouts.clock-example');
    }

    public function chart()
    {
        return view('layouts.chart-example');
    }

    public function form()
    {
        return view('layouts.form-example');
    }

    public function map()
    {
        return view('layouts.map-example');
    }

    public function calendar()
    {
        return view('layouts.calendar-example');
    }

    public function gallery()
    {
        return view('layouts.gallery-example');
    }

    public function todo()
    {
        return view('layouts.todo-example');
    }

    public function contact()
    {
        return view('layouts.contact-example');
    }

    public function faq()
    {
        return view('layouts.faq-example');
    }

    public function news()
    {
        return view('layouts.news-example');
    }

    public function about()
    {
        return view('layouts.about-example');
    }
}