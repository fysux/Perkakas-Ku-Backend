<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'orderID';

    protected $fillable = [
        'userID',
        'barangID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barangID');
    }
}
