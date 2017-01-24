<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Models\Admin\Mailbox;
use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    public function index()
    {
        $mailbox = Mailbox::where('map', 'INBOX')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.mailbox.inbox', ['mailbox' => $mailbox]);
    }
}
