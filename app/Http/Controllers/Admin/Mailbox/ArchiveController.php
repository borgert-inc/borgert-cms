<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Models\Admin\Mailbox;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    public function index()
    {
        $mailbox = Mailbox::where('map', 'ARCHIVE')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.mailbox.archive', ['mailbox' => $mailbox]);
    }

    public function archive($id)
    {
        $mailbox = Mailbox::find($id);
        $mailbox->map = 'ARCHIVE';
        $mailbox->save();

        \Session::flash('success', trans('admin/mailbox.archive.messages.success'));

        return redirect()->route('admin.mailbox.archive');
    }
}
