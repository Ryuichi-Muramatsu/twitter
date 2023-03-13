<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(Auth::id());

        return view('users.index',['all_users' => $all_users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,Tweet $tweet,Follower $follower)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.show',[
            'login_user' => $login_user,
            'user' => $user,
            'is_following' => $is_following,
            'is_followed' => $is_followed,
            'timelines' => $timelines,
            'tweet_count' => $tweet_count,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'screen_name' => ['required','string','max:50',Rule::unique('users')->ignore($user->id)],
            'name' => ['required','string','max:255'],
            'profile_image' => ['file','image','mimes:jpeg,png,jpg','max:2048'],
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)
            ]
        ]);

        $validator->validate();
        $user->updateProfile($data);

        return redirect('users/'.$user->id)->with('flash_message','更新が完了しました！');
    }

    // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following){
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
            // フォローしていなければフォローする
            $follower->unfollow($user->id);
            return back();
        }   
    }

}


// 下記、アップデート実行時のデータの流れ

// 編集ブレードで更新ボタンを押下したら、コントローラのupdateメソッドが走る。
// フォームから受けっとたデータをupdateメソッドでバリデート
// 本命のアップデートはモデルに定義したupdateProfileメソッドで実行
// リクエストに画像データの有無で、画像保存の処理を入れるか振り分ける。





/**
 * リソースコントローラもルート名が自動で設定されるようになっている。
 */