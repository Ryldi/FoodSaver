<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RestaurantController extends Controller
{
    public function index($id)
    {
        $restaurant = Restaurant::with('products')->find($id);
        $products = Product::where('restaurant_id', $restaurant->id)->where('status', true)->get();

        return view('pages.restaurantDetail', compact('restaurant', 'products'));
    }

    public function updateAddress(Request $request)
    {
        Restaurant::where('id', Auth::guard('restaurant')->user()->id)->update([
            'street' => $request->nama_jalan,
            'subdistrict' => $request->kecamatan,
            'city' => $request->kota,
            'province' => $request->provinsi,
            'postal_code' => $request->kode_pos
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Address successfully updated' : 'Alamat berhasil diperbarui');
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

            return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Profile successfully updated' : 'Profil berhasil diperbarui');
        }

        return redirect()->back()->with('error', (session()->get('locale') === 'en') ? 'Product failed to update' : 'Produk gagal diperbarui');
    }

    public function updatePassword(Request $request)
    {
        // dd($request,  Auth::guard('restaurant')->user()->password, Hash::check($request->old_password, Auth::guard('restaurant')->user()->password));
        $request->validate([
            'new_password' => 'required|string',
        ]);

        if(!Hash::check($request->old_password, Auth::guard('restaurant')->user()->password)) {
            return redirect()->back()->with('error', (session()->get('locale') === 'en') ? 'Old password is wrong' : 'Password lama salah');
        }

        if(strcmp($request->new_password, $request->old_password) == 0) {
            return redirect()->back()->with('error', (session()->get('locale') === 'en') ? 'New password cannot be the same as the current password' : 'Password baru tidak boleh sama dengan password saat ini');
        }

        if(strcmp($request->confirm_password, $request->new_password) != 0) {
            return redirect()->back()->with('error', (session()->get('locale') === 'en') ? 'Passwords do not match' : 'Password baru dan konfirmasi password tidak sama');
        }

        $user = Restaurant::where('id', Auth::guard('restaurant')->user()->id)->first();

        if ($user) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            Auth::guard('restaurant')->setUser($user);
        
            return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Password successfully updated' : 'Password berhasil diperbarui');
        }

        return redirect()->back()->with('error', (session()->get('locale') === 'en') ? 'Product failed to update' : 'Produk gagal diperbarui');
    }

    public function getAllRestaurant() 
    {
        $restaurants = Restaurant::with('category')->paginate(6);
        $categories = Category::all();
        return view('pages.restaurantList', compact('restaurants', 'categories'));
    }

    public function getByCategory($id)
    {
        $restaurants = Restaurant::with('category')->where('category_id', $id)->paginate(6);
        $categories = Category::all();
        $selectedCategory = Category::find($id);
        return view('pages.restaurantList', compact('restaurants', 'categories', 'selectedCategory'));
    }

    public function sortRestaurant()
    {
        $restaurants = Restaurant::with('category')->orderBy('rating', 'desc')->paginate(6);
        $categories = Category::all();
        return view('pages.restaurantList', compact('restaurants', 'categories'));
    }

    public function searchRestaurant(Request $request)
    {
        $restaurants = Restaurant::with('category')->where('name', 'like', '%' . $request->query('search') . '%')->paginate(6);
        $categories = Category::all();
        return view('pages.restaurantList', compact('restaurants', 'categories'));
    }

    public function updateDescription(Request $request)
    {
        Restaurant::where('id', Auth::guard('restaurant')->user()->id)->update([
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', (session()->get('locale') === 'en') ? 'Description successfully updated' : 'Deskripsi berhasil diperbarui');
    }
}
