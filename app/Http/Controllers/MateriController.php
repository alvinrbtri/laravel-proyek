<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index()
    {
     
        return view('materis',[
            "judul" => "All Materis",
            "active" => 'materis',
            "materis" => Materi::latest()->filter(request(['cari', 'kategori', 'author']))
            ->paginate(7)->withQueryString()
        ]);
    }

    public function show(Materi $materi)
    {
        return view('materi',[
            "judul" => "Single Materi",
            "active" => 'materis',
            "materi" => $materi
        ]);
    }
}
