<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMaster;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request) // untuk login
    {
        $email = $request->email;
        $password = $request->password;

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return view('home');
        } else {
            return redirect('/login')->with('error', 'Email atau Password salah');
        }
    }

    public function newuser(Request $request) // untuk register
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Lakukan cek apakah email sudah terdaftar sebelumnya
        $existingUser = User::where('email', $email)->first();
        if ($existingUser) {
            return redirect('/register')->with('error', 'Email sudah terdaftar. Silakan gunakan email lain.');
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password_hash;
        if ($user->save()) {
            return redirect('login');
        }

        return redirect('/login');
    }

    public function upgrade(Request $request)
    {   
        // buat program untuk mencek apakah user telah upgrade
        if (UserMaster::where('userID', User::where('email', $request->email)->first()->userID)->exists()) {
            return redirect('/')->with('error', 'Akun anda sudah diupgrade');
        }

        // lakukan upgrade
        $email = $request->email;

        $upgrade = new UserMaster();
        $upgrade->userID = User::where('email', $email)->first()->userID;
        if ($upgrade->save()) {
            return redirect('/')->with('success', 'Akun anda telah diupgrade');
        }
    }

    public function barang()
    {
        $getUserMaster = Auth::user();

        $data = Barang::where('usermasterID', $getUserMaster->usermaster->usermasterID)->get();
        return view('barang_saya', [
            'data' => $data
        ]);
    }

    public function editbarang(Request $request)
    {
        // Ambil user yang sedang terautentikasi
        $user = Auth::user();

        // Periksa apakah user memiliki UserMaster
        $userMasterID = $user->usermaster ? $user->usermaster->usermasterID : null;

        if ($userMasterID) {
            $barangID = Barang::findOrFail($request->barangID);

            return view('editbarang', [
                'barangID' => $barangID,
                'usermasterID' => $userMasterID
            ]);
        }
    }

    public function update(Request $request)
    {
        $barangID = $request->route('barangID');
        $name = $request->input('name');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');
        $stok = $request->input('stok');
    
        $data = [];
        $data[]= $request->input('kategoriID');
    
        $update = Barang::where('barangID', $barangID)->update([
            'name' => $name,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'stok' => $stok,
        ]);

        return redirect('/barangsaya')->with('success', 'Barang Berhasil diedit');
    }

    public function delete(Request $request)
    {
        $barangID = $request->route('barangID');
        $delete = Barang::where('barangID', $barangID)->delete();
        return redirect('/barangsaya')->with('success', 'Barang Berhasil dihapus');
    }
}
