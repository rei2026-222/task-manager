<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスク管理アプリ</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">タスク一覧</h1>

        <!-- タスク登録フォーム -->
        <form action="{{ route('tasks.store') }}" method="POST" class="mb-6 flex gap-4">
            @csrf
            
            <!-- タスク名入力 -->
            <input type="text" name="title" placeholder="新しいタスクを入力..." class="border p-2 rounded flex-1" required>
            
            <!-- カテゴリー選択プルダウン -->
            <select name="category_id" class="border p-2 rounded" required>
                <option value="">カテゴリー選択</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            
            <!-- 追加ボタン -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">追加</button>
        </form>

        <!-- タスクリスト -->
        <div class="mt-6">
            <h2 class="text-xl font-bold mb-3">タスクリスト</h2>
            
            <ul class="space-y-2">
                @foreach($tasks as $task)
                    <li class="flex justify-between items-center border-b py-2">
                        <div class="flex items-center gap-4">
                            <!-- タスク名 -->
                            <span class="font-semibold">{{ $task->title }}</span>
                            
                            <!-- カテゴリー名（紐づいている場合のみ表示） -->
                            @if($task->category)
                                <span class="text-sm bg-gray-200 text-gray-700 px-2 py-1 rounded">
                                    {{ $task->category->name }}
                                </span>
                            @endif
                        </div>

                        <!-- 削除ボタン -->
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline text-sm">削除</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</body>
</html>