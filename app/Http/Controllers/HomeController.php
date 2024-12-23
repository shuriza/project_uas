<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function blank()
    {
    // Ambil data pengguna login
    $userName = auth()->user()->name;

    // Filter pesanan berdasarkan nama pengguna
    $pesanan = Pesanan::where('namaClient', $userName)->paginate(10);

    // Return view dengan data
    return view('layouts.blank-page', compact('pesanan'));
    }


    public function index()
    {
        $pesanan = Pesanan::all(); // Ambil semua data pesanan dari model
        $prosesCount = Pesanan::where('status', 'Proses')->count(); // Hitung status 'Proses'
        $selesaiCount = Pesanan::where('status', 'Selesai')->count(); // Hitung status 'Selesai'
    
        return view('home', compact('pesanan', 'prosesCount', 'selesaiCount'));
    }
    


}
