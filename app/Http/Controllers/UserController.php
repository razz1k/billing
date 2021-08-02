<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use http\Client\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($user = null) {
        if (!isset($user)) {
            $user = Auth::user();
        } else {
            $user = User::where('first_name', $user)->firstOrFail();
        }

        return view('profile', ['user' => $user]);
    }

    public function edit(Request $request) {
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);

        /** @var User $user */
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('profile.show');
    }
}
