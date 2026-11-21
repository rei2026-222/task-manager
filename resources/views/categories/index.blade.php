<h1>カテゴリー一覧</h1>

<a href="{{ route('categories.create') }}">新規登録</a>

@foreach ($categories as $category)
    <div>
        <p>{{ $category->name }}</p>

        <a href="{{ route('categories.edit', $category) }}">
            編集
        </a>

        <form action="{{ route('categories.destroy', $category) }}"
      method="POST"
      onsubmit="return confirm('本当に削除しますか？');">

    @csrf
    @method('DELETE')

    <button type="submit">
        削除
    </button>
</form>
    </div>
@endforeach