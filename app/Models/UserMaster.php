<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMaster extends Model
{
    use HasFactory;

    protected $table = 'usermaster';

    protected $primaryKey = 'usermasterID';

    protected $fillable = [
        'userID',
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    // Definisikan relasi dengan model Barang
    public function barang()
    {
        return $this->hasMany(Barang::class, 'usermasterID');
    }
}
