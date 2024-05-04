<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // User モデルをインポート

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_type' => 'required|in:admin,sales,warehouse'
        ]);

        try {
            $user->update([
                'user_type' => $request->user_type
            ]);

            return redirect()->route('admin.users.index')->with('success', 'ユーザータイプが更新されました。');
        } catch (\Exception $e) {
            \Log::error('ユーザー更新エラー: ' . $e->getMessage());
            // 例外が発生した場合、エラーメッセージと共に編集ページにリダイレクト
            return redirect()->back()->withInput()->withErrors(['update' => '更新処理中にエラーが発生しました。']);
        }
    }
}