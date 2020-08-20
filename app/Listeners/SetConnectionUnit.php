<?php

namespace App\Listeners;

use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Session;

class SetConnectionUnit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $userUnit = Admin::user()->unit;

        Session::put('user', $userUnit);
        Session::put('unit_name', $userUnit->id);
    }
}
