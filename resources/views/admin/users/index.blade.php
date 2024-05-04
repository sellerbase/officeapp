@foreach ($users as $user)
    <div>{{ $user->name }} - {{ $user->user_type }}
        <a href="{{ route('admin.users.edit', $user) }}">編集</a>
    </div>
@endforeach