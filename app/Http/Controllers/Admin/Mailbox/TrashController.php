<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Models\Admin\Mailbox;
use App\Http\Controllers\Controller;

class TrashController extends Controller
{
    public function index()
    {
        $mailbox = Mailbox::where('map', 'TRASH')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.mailbox.trash', ['mailbox' => $mailbox]);
    }

    public function trash($id)
    {
        $mailbox = Mailbox::find($id);
        $mailbox->map = 'TRASH';
        $mailbox->save();

        \Session::flash('success', trans('admin/mailbox.trash.messages.success'));

        return redirect()->route('admin.mailbox.trash');
    }
}
