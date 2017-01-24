<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Mailbox;
use App\Http\Controllers\Controller;

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
        $mailbox = [
            'inbox' => Mailbox::where('map', 'INBOX'),
            'archive' => Mailbox::where('map', 'ARCHIVE'),
            'trash' => Mailbox::where('map', 'TRASH'),
        ];

        return view('admin.dashboard.index', $mailbox);
    }
}
