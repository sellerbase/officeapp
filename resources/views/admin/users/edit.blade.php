<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf
    @method('PUT')
    <select name="user_type">
        <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="sales" {{ $user->user_type == 'sales' ? 'selected' : '' }}>営業スタッフ</option>
        <option value="warehouse" {{ $user->user_type == 'warehouse' ? 'selected' : '' }}>倉庫スタッフ</option>
    </select>
    <button type="submit">更新</button>
</form>