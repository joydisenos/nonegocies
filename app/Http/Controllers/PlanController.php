<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cambiarPlan($plan)
    {
        $user = User::findOrFail(Auth::user()->id);
        if($plan == 0)
        {
            $user->plan_id = null;
        }else{
            $user->plan_id = $plan;
        }
        $user->save();

        return redirect()->back()->with('status','Plan Contratado con éxito');
    }
}
