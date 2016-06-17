<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Mailbox;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	// Mailbox
        $mailbox['inbox'] = Mailbox::where('map', 'INBOX');
        $mailbox['archive'] = Mailbox::where('map', 'ARCHIVE');
        $mailbox['trash'] = Mailbox::where('map', 'TRASH');

        return view('admin.dashboard.index', $mailbox);
    }
}
