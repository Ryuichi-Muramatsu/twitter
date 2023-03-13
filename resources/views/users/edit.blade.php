<x-applayout>
    <div class="mt-8"></div>
    <div class="container-wrapper">
        <div class="container target-user">
            <div>プロフィールの編集画面です。</div>
            <div class="button-wrapper">
                <form action="{{ url('users/' .$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name">ユーザ名　　：</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div>
                        <label for="screen_name">アカウント名：</label>
                        <input type="text" name="screen_name" value="{{ $user->screen_name }}">
                    </div>
                    <div>
                        <label for="email">email　　　：</label>
                        <input type="text" name="email" value="{{ $user->email }}">
                    </div>
                    <div>
                        <label for="profile_image">email　　　：</label>
                        <input type="file" name="profile_image">
                    </div>
                    <div>
                        <button class="update_button" >更新する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-applayout>

{{-- 編集できる内容 --}}
{{-- screen_name --}}
{{-- name --}}
{{-- password --}}
{{-- profile_image --}}