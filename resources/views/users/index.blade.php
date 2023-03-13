{{-- <x-applayout>
    <div>
        <h1 class="text-white">こんにちは！</h1>
    </div>
</x-applayout> --}}

<x-applayout>
    <div class="mt-8"></div>
    @foreach ($all_users as $user)
    <div class="flex py-4 mx-80 bg-gray-100 border">
        <div class="flex items-center pl-4">
            <a href="{{ url('users/'.$user->id) }}">
                <img style="width:50px" class="rounded" src="{{ asset('storage/profile_image/'.$user->profile_image) }}"
                    alt="">
            </a>
        </div>
        <div class="pl-4">
            <p>{{ $user->name }}</p>
            <a href="{{ url('users/'.$user->id) }}">{{ $user->screen_name }}</a>
            @if (auth()->user()->isFollowed($user->id))
            <span>フォローされています</span>
            @endif
            <div class="d-flex justify-content-end flex-grow-1">
                @if (auth()->user()->isFollowing($user->id))
                <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dange bg-red-500">フォロー解除</button>
                </form>
                @else
                <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary bg-blue-500">フォローする</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    <div class="flex justify-center px-12" style="margin-top: 50px">
        {{ $all_users->links() }}
    </div>
</x-applayout>