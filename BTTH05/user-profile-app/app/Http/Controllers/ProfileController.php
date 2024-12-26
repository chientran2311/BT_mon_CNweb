<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'bio' => 'nullable|string',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Cập nhật thông tin user
    $user->name = $request->name;
    $user->email = $request->email;
    $user->bio = $request->bio;

    // Xử lý avatar
    if ($request->hasFile('avatar')) {
        // Xóa ảnh cũ nếu có
        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        // Lưu ảnh mới
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
    }

    // Lưu thay đổi
    $user->save();

    // Chuyển hướng đến trang profile.show sau khi cập nhật thành công
    return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully!');
}

}
