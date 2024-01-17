<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $message=['error'=>false,'message'=>' Mise a jour du compte reussi','current'=>'account'];

        return view('pages/my-account',$message);
    }

    public function updatePassword(Request $request){
        $errors = new MessageBag();
        $password= $request->password;
        $new_password= $request->new_password;
        $new_password_clone= $request->new_password_clone;
        $message=['error'=>false,'message'=>'','current'=>'account'];
        if(Hash::check($password,$request->user()->password)){
            if( $new_password==$new_password_clone){
                $request->user()->fill([
                    'password' => Hash::make($request->new_password)
                ])->save();
                $message['message']='mis a jour du mot de passe avec succes';
            }else{
                $message['error']=true;
                $message['message']='les mots de passe ne se corresponde pas';
            }

        }else{
            $message['error']=true;
            $message['message']='mot de passe incorrect';
        }
        $errors->add('your_custom_error', 'Your custom error message!');
        return view('pages/my-account',$message);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
