<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Mailbox;

class DeleteController extends Controller
{
    public function destroy(Request $request)
    {
        if (is_null($request->messages)) {
            \Session::flash('info', 'Nenhuma mensagem foi selecionado.');

            return redirect()->route('admin.mailbox.inbox');
        }

        Mailbox::destroy($request->messages);
        \Session::flash('success', 'A(s) mensagen(s) foram removida(s) com sucesso!');

        return redirect()->route('admin.mailbox.inbox');
    }
}
