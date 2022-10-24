<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param  \App\Models\User  $user
     *
     * @return mixed
     */
    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }

    /**
     * @param  \App\Models\Profile  $profile
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showFollowers(Profile $profile)
    {
        $followers = $profile->followers;

        return view('follow.followers')
            ->with('followers', $followers);
    }

    /**
     * @param  \App\Models\Profile  $profile
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showFollowing(Profile $profile)
    {
        $following = $profile->user->following;

        return view('follow.following')
            ->with('following', $following);
    }
}
