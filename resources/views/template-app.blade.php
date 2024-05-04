<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アプリケーションテンプレート</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- ナビゲーションバー -->
        @include('layouts.nav')

        <div class="flex flex-1">
            <!-- サイドメニュー -->
            @include('layouts.side')

            <!-- メインコンテンツ -->
            @include('layouts.main-space')
        </div>
    </div>
</body>
</html>
