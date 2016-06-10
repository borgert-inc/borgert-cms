<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Mailbox;

class ArchiveController extends Controller
{
    

    public function index()
    {
    	$mailbox = Mailbox::where('map','ARCHIVE')->paginate(10);

        return view('admin.mailbox.archive', ['mailbox' => $mailbox]);
    }


    public function archive(Request $request, $id)
    {
       
        $mailbox = Mailbox::find($id);
        $mailbox->map = 'ARCHIVE';
        $mailbox->save();

        \Session::flash('success', 'A mensagem foi movida para "Arquivados".');

        return redirect()->route('admin.mailbox.archive');
    }

}
