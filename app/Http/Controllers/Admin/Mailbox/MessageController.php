<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Models\Admin\Mailbox;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index($id)
    {
        $message = Mailbox::find($id);

        $message->open = 1;
        $message->save();

        return view('admin.mailbox.message', ['message' => $message]);
    }
}
