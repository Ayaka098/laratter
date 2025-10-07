<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ❤️ Like通知
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 py-6">
        @forelse ($notifications as $notification)
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 mb-4 border border-gray-200 dark:border-gray-700">
                <p class="text-gray-700 dark:text-gray-300">
                    <span class="font-semibold">ユーザーID:</span> {{ $notification->data['liked_by'] ?? '不明' }} が
                    あなたの投稿（ID: <span class="font-semibold">{{ $notification->data['post_id'] ?? '不明' }}</span>）に
                    いいねしました。
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                    {{ $notification->created_at->format('Y年m月d日 H:i') }}
                </p>
            </div>
        @empty
            <div class="text-center text-gray-500 dark:text-gray-400">
                通知はまだありません。
            </div>
        @endforelse
    </div>
</x-app-layout>