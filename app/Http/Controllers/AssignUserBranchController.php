<?php

namespace App\Http\Controllers;

use App\Enums\Message;
use App\Models\User;
use Illuminate\Http\Request;

class AssignUserBranchController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $user->branch_office_id = $request->branch_office_id;

        $user->save();

        flash(Message::ASSIGN);

        return back();
    }
}
