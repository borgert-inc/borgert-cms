<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin\Mailbox;

class TrashController extends Controller
{


    public function index()
    {
    	$mailbox = Mailbox::where('map','TRASH')->paginate(10);

        return view('admin.mailbox.trash', ['mailbox' => $mailbox]);
    }

    public function trash(Request $request, $id)
    {
       
        $mailbox = Mailbox::find($id);
        $mailbox->map = 'TRASH';
        $mailbox->save();

        \Session::flash('success', 'A mensagem foi movida para "Lixeira".');

        return redirect()->route('admin.mailbox.trash');
    }


}
