<x-applayout>
    <div class="mt-8"></div>
    <div class="container-wrapper">
        <div class="container target-user">
            <div>プロフィールの編集画面です。</div>
            {{-- @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}
            <form action="{{ url('users/' .$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @error('name')
                <span class="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div>
                    <label for="name">ユーザ名　　　　：</label>
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
                @error('screen_name')
                <span class="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div>
                    <label for="screen_name">アカウント名　　：</label>
                    <input type="text" name="screen_name" value="{{ old('screen_name') }}">
                </div>
                @error('email')
                <span class="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div>
                    <label for="email">メールアドレス　：</label>
                    <input type="text" name="email" value="{{ old('email') }}">
                </div>
                @error('profile_image')
                <span class="alert"> 
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div>
                    <label for="profile_image">プロフィール画像：</label>
                    <input type="file" name="profile_image">
                </div>
                <div>
                    <button class="update_button">更新する</button>
                    <a href="{{ url('users/' .$user->id) }}" class="back_button">戻る</a>
                </div>
            </form>
        </div>
    </div>
</x-applayout>

{{-- 編集できる内容 --}}
{{-- screen_name --}}
{{-- name --}}
{{-- password --}}
{{-- profile_image --}}