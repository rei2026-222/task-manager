<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        // ログインユーザーのタスクとカテゴリーを取得
        $tasks = Task::where('user_id', $userId)->with('category')->get();
        $categories = Category::where('user_id', $userId)->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function store(Request $request)
    {
        // バリデーション（入力チェック）
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // タスクの保存
        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('tasks.index');
    }
}