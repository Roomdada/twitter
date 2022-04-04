<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TweetController extends Controller
{
  public function index()
  {
    $tweets = \App\Models\Tweet::with('user')->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])->get();

    return Inertia::render('Tweets/Index', [
      'tweets' => $tweets,
    ]);
  }

  public function store(Request $request)
  {
    $tweet = \App\Models\Tweet::create([
      'user_id' => auth()->id(),
      'contant' => $request->content ?? null,
      'image' => $request->image->store('tweets') ?? null,
    ]);

    return redirect()->route('tweets.index');
  }


  public function update(Request $request, Tweet $tweet)
  {
    $tweet->update([
      'contant' => $request->content ?? null,
      'image' => $request->image->store('tweets') ?? null,
    ]);

    $tweet->fresh();

    return redirect()->route('tweets.index');
  }


  public function destroy(Request $request)
  {
    $tweet = \App\Models\Tweet::find($request->id)->delete();
    return redirect()->route('tweets.index');
  }

}
