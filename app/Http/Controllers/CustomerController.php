<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('image');
        $contents = file_get_contents($file->getRealPath());
        $base64 = base64_encode($contents);
        $mimeType = $file->getMimeType();
        $base64Data = 'data:' . $mimeType . ';base64,' . base64_encode($contents);

        $user = Customer::where('id', Auth::guard('customer')->user()->id)->first();

        if ($user) {
            $user->image = $base64Data;
            $user->save();

            Auth::guard('customer')->setUser($user);

            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Profil gagal diperbarui');
    }

    public function updatePassword(Request $request)
    {
        // dd($request,  Auth::guard('restaurant')->user()->password, Hash::check($request->old_password, Auth::guard('restaurant')->user()->password));
        $request->validate([
            'new_password' => 'required|string',
        ]);

        if(!Hash::check($request->old_password, Auth::guard('customer')->user()->password)) {
            return redirect()->back()->with('error', 'Password salah');
        }

        if(strcmp($request->new_password, $request->old_password) == 0) {
            return redirect()->back()->with('error', 'Password baru tidak boleh sama dengan password saat ini');
        }

        if(strcmp($request->confirm_password, $request->new_password) != 0) {
            return redirect()->back()->with('error', 'Password baru dan konfirmasi password tidak sama');
        }

        $user = Customer::where('id', Auth::guard('customer')->user()->id)->first();

        if ($user) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            Auth::guard('customer')->setUser($user);
        
            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Password gagal diperbarui');
    }
}
