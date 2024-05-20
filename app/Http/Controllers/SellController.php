<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMaster;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    public function index(Request $request)
    {
        $data_kategori = Kategori::all();
        // Ambil user yang sedang terautentikasi
        $user = Auth::user();

        // Periksa apakah user memiliki UserMaster
        $userMasterID = $user->usermaster ? $user->usermaster->usermasterID : null;

        return view('jual', [
            'usermasterID' => $userMasterID,
            'data_kategori' => $data_kategori
        ]);
    }

    public function store(Request $request)
    {
        // Ambil user yang sedang terautentikasi
        $user = Auth::user();

        // Periksa apakah user memiliki UserMaster
        $userMasterID = $user->usermaster ? $user->usermaster->usermasterID : null;

        if ($userMasterID) {
            $nama = $request->input('name');
            $deskripsi = $request->input('deskripsi');
            $harga = $request->input('harga');
            $stok = $request->input('stok');
            $image = $request->input('image');
            $data = [];
            $data[]= $request->input('kategoriID');

            // konversi image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public');
            }

            $barang = new Barang();
            $barang->name = $nama;
            $barang->deskripsi = $deskripsi;
            $barang->harga = $harga;
            $barang->stok = $stok;
            $barang->image = $imagePath;
            $barang->usermasterID = $userMasterID;
            $barang->kategoriID = $data[0];
            if ($barang->save()) {
                return redirect('/')->with('success', 'Barang anda telah dijual');
            }
        }

        return redirect('/')->with('error', 'Barang anda gagal dijual');
    }

    public function search(Request $request)
    {
        // data diambil dari home.blade.php untuk mencari barang sesuai kategori
        $data = [];
        $data[]= $request->input('kategoriID');
        $data_barang = Barang::where('kategoriID', $data[0])->get();
        return view('search', [
            'data' => $data,
            'data_barang' => $data_barang
        ]);
    }
}
