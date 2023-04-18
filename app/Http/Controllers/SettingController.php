<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingController extends Controller
{
    public function setting(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("status-error", "Password lama salah!");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password berhasil diganti!");
    }
    Public function name(Request $request){
        $request->validate([
            'new_name' => 'required|max:20'
        ]);
        User::whereId(auth()->user()->id)->update([
            'name'=>$request->new_name
        ]);
        return redirect('setting')->with('status', 'Name has been changed');
    }
    public function delete(Request $request){
        $request->validate([
            'password' => 'required'
        ]);
        if(!Hash::check($request->password, auth()->user()->password)){
            return back()->with("status-error", "Password salah!");
        }
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('status','Akun anda berhasil dihapus!');
    }
}
