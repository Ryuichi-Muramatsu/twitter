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
            <img class="rounded" src="{{ $user->profile_image }}" alt="">
        </div>
        <div class="pl-4">
            <p>{{ $user->name }}</p>
            <a href="{{ url('users/'.$user->id) }}">{{ $user->screen_name }}</a>
        </div>
    </div>
    @endforeach
    <div class="text-white flex justify-center px-12">
        {{ $all_users->links() }}
    </div>
</x-applayout>