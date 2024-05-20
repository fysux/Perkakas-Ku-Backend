<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'barangID';

    protected $fillable = [
        'name',
        'deskripsi',
        'harga',
        'stok',
        'image',
        'kategoriID',
        'usermasterID',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriID');
    }

    public function usermaster()
    {
        return $this->belongsTo(UserMaster::class, 'usermasterID');
    }
}
