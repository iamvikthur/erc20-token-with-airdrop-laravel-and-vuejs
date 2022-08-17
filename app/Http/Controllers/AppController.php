<?php

namespace App\Http\Controllers;

use App\Models\Airdrop;
use App\Models\User;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AppController extends Controller
{
    public function checkAirdropStatus($user_id)
    {
        $user = Airdrop::where('telegram_id', $user_id)->first();

        if ($user) {
            return response($user, 200);
        }

        return response($user, 401);
    }
    public function saveAirdropUser(Request $request)
    {
        $this->validate($request, [
            'telegram_id' => 'required',
            'telegram_name' => 'required',
            'telegram_username' => 'required',
            'twitter_username' => 'required',
            'discord_username' => 'required',
            'bep20_address' => 'required',
        ]);

        $user = Airdrop::where('telegram_id', $request->telegram_id)->first();

        if ($user) {
            return response($user, 200);
        }

        $user = new Airdrop();

        $user->telegram_id = $request->telegram_id;
        $user->telegram_name = $request->telegram_name;
        $user->telegram_username = $request->telegram_username;
        $user->twitter_username = $request->twitter_username;
        $user->discord_username = $request->discord_username;
        $user->bep20_address = $request->bep20_address;

        $referral = IdGenerator::generate(['table' => 'airdrops', 'field'=>'referral', 'length' => 8, 'prefix' => 'ngl968']);

        $user->referral = $referral;

        $user->save();

        return response($user, 200);
        
    }
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
