<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AppController extends Controller
{
    public function authUser(Request $request)
    {
        $this->validate($request, [
            'bep20_address' => 'required'
        ]);

        $user = User::where('bep20_address', $request->bep20_address)->first();

        if (is_null($user))
        {
            $user = new User();
            $referral = IdGenerator::generate(['table' => 'users', 'field'=>'referral', 'length' => 8, 'prefix' => 'ngl978']);
            $user->bep20_address = $request->bep20_address;
            $user->referral = $referral;

            if ($request->referrer)
            {
                $addr = $request->referrer->bep20_address;

                if ($addr != $user->bep20_address)
                {
                    // check if addres is a valid user
                    $referrer = User::where('bep20_address', $addr)->first();

                    if (!is_null($referrer))
                    {
                        $referrer->referral_count = $referrer->referral_count + 1;
                        $user->referred_by = $addr;
                        $referrer->save();
                    }
                }
            }

            $user->save();

            return response($user, 200);
        }

        return response($user, 200);
        
    }

    public function getReferrer(Request $request)
    {
        $code = $request->ref;

        $user  = User::where('referral', $code)->first();
    

        return view('dashboard.index', compact('user'));
    }
}
