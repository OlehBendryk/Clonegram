<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
//       $profiles = Profile::all();
//
//       return view()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Profile $profile)
    {
        $postCount = Cache::remember(
            'post.count.' . $profile->user->id,
            now()->addSeconds(30),
            function () use($profile) {
                return $profile->user->posts()->count();
            });
        $followerCount = Cache::remember('follower.count.' . $profile->user->id,
            now()->addSeconds(30),
            function () use($profile) {
               return $profile->followers->count();
            });
        $followingCount = Cache::remember('following.count.' . $profile->user->id,
            now()->addSeconds(30),
            function () use($profile) {
                return $profile->user->following->count();
            });

        $follows = (auth()->user()) ? auth()->user()->following->contains($profile->id) : false;

        return view('profiles.show')
            ->with('postCount', $postCount)
            ->with('followerCount', $followerCount)
            ->with('followingCount', $followingCount)
            ->with('profile', $profile)
            ->with('follows', $follows);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit')
            ->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image'
        ]);


        if ($request->image){
            $imageName = time() . '.' . $request->image->extension();

            $imagePath = request('image')->storeAs('profile', $imageName, 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        $profile->update(array_merge(
            $data,
           $imageArray ?? []
        ));

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
