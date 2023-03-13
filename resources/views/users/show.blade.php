<x-applayout>
    <div class="container-wrapper">
        <div class="container target-user">
            <div class="img-etc">
                <img style="width:50px" class="profile_image" src="{{ asset('storage/profile_image/'.$user->profile_image) }}" alt="">
                @if ($login_user->id === $user->id)
                <div class="button-wrapper">
                    <a href="{{ url('users/' .$user->id .'/edit') }} " class="edit_button">プロフィールを編集する</a>
                </div>
                @else
                <div class="text">
                    @if ($is_following)
                    <form action="{{ route('unfollow',['user' => $user->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="lift-follow">フォロー解除</button>
                    </form>
                    @else
                    <form action="{{ route('follow',['user' => $user->id]) }}" method="post">
                        @csrf
                        <button class="do-follow">フォローする</button>
                    </form>
                    @endif
                    @if ($is_followed)
                    <p class="follow-status">フォローされています</p>
                    @endif
                </div>
                @endif
            </div>
            <div class="brother">ユーザー名　：{{ $user->name }}</div>
            <div class="brother">アカウント名：{{ $user->screen_name }}</div>
            <div class="brother">ツイート数　：{{ $tweet_count }}</div>
            <div class="brother">フォロー数　：{{ $follow_count }}</div>
            <div class="brother">フォロワー数：{{ $follower_count }}</div>
        </div>
    </div>

    @foreach ($timelines as $timeline)
    <div class="container-wrapper">
        <div class="container">
            <div>
                <img style="width:50px" class="profile_image" src="{{ asset('storage/profile_image/'.$user->profile_image) }}" alt="">
            </div>
            <div class="brother">ユーザー名　：{{ $user->name }}</div>
            <div class="brother">アカウント名：{{ $user->screen_name }}</div>
            <div class="brother">投稿時間　　：{{ $timeline->created_at->format('Y-m-d H:i') }}</div>
            <div class="brother">ツイート内容：{{ $timeline->text}}</div>
        </div>
    </div>
    @endforeach
</x-applayout>


{{-- ログイン中のユーザーと、クエリパラメーターが一致しているなら、編集するボタン --}}
{{-- ログイン中のユーザーと、クエリパラメーターが異なるなら、フォロー有無ボタン、フォロー状況の表示 --}}
{{-- フォロー有無ボタンでは再度if文でフォローするorフォロー解除するを振り分ける。 --}}