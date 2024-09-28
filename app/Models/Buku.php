<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Buku extends Model
{
    use HasFactory;
    protected $table = "tb_buku";
    protected $primaryKey = "id_buku";
    protected $guarded = [];

    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
