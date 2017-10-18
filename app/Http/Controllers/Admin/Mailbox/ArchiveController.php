<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Models\Admin\Mailbox;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    /**
     * @var Mailbox
     */
    protected $mailbox;

    /**
     * ArchiveController constructor.
     * @param Mailbox $mailbox
     */
    public function __construct(Mailbox $mailbox)
    {
        $this->mailbox = $mailbox;
    }

    public function index()
    {
        $mailbox = $this->mailbox->where('map', 'ARCHIVE')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.mailbox.archive', ['mailbox' => $mailbox]);
    }

    public function archive($id)
    {
        $mailbox = $this->mailbox->find($id);
        $mailbox->update(['map' => 'ARCHIVE']);

        \Session::flash('success', trans('admin/mailbox.archive.messages.success'));

        return redirect()->route('admin.mailbox.archive');
    }
}
