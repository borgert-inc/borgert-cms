<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;
use App\Models\Admin\Mailbox;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function destroy(Request $request)
    {
        if (is_null($request->messages)) {
            \Session::flash('info', trans('admin/mailbox.destroy.messages.info'));

            return redirect()->route('admin.mailbox.inbox');
        }

        Mailbox::destroy($request->messages);
        \Session::flash('success', trans('admin/mailbox.destroy.messages.success'));

        return redirect()->route('admin.mailbox.inbox');
    }
}
