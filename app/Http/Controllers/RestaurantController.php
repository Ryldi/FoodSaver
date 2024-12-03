<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function updateAddress(Request $request)
    {
        Restaurant::where('id', Auth::guard('restaurant')->user()->id)->update([
            'street' => $request->nama_jalan,
            'subdistrict' => $request->kecamatan,
            'city' => $request->kota,
            'province' => $request->provinsi,
            'postal_code' => $request->kode_pos
        ]);

        return redirect()->back()->with('success', 'Alamat berhasil diperbarui');
    }

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

        $user = Restaurant::where('id', Auth::guard('restaurant')->user()->id)->first();

        if ($user) {
            $user->image = $base64Data;
            $user->save();

            Auth::guard('restaurant')->setUser($user);

            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Profil gagal diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $user = Restaurant::where('id', Auth::guard('restaurant')->user()->id)->first();

        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::guard('restaurant')->setUser($user);

            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Password gagal diperbarui');
    }
}
