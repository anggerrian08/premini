<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price','quantity', 'kategori_id', 'supplayer_id'];

    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }


    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity'); 
    }

    public function supplayer()
    {
        return $this->belongsTo(Supplayer::class);
    }
}
