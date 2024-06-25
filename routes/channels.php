<?php

use Illuminate\Support\Facades\Broadcast;
use App\Broadcasting\ShareLocationChannel;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat.{id}', function ($user, $id) {

    return ['userId'=> '15'];
   // return (int) $user->id === (int) $id;
});

Broadcast::channel('Share_location_Private_Channel', ShareLocationChannel::class);


//Share_location_Private_Channel

// Broadcast::channel('Share_location_Private_Channel', function () {
//     return true;
// });