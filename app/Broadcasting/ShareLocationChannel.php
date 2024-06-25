<?php

namespace App\Broadcasting;

use App\Http\Models\Role;
use App\Http\Models\User;

class ShareLocationChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Http\Models\User  $user
     * @return array|bool
     */
    public function join( Role $user)
    {
        return true;
    }
}
