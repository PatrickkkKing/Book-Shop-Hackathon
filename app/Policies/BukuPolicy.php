<?php

namespace App\Policies;

use App\Models\Buku;
use App\Models\User;

class BukuPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
        
    }
    public function view(User $user, Buku $buku)
    {
        return $user->id === $buku->user_id;
    }
}
