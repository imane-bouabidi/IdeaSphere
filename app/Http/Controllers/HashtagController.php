<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    public function addHashtag(Request $request)
    {
        Tag::create([
            'Name'=>$request->HashtagInput,
        ]);
        return redirect()->route('hashtags');
    }
    public function Edit_Hashtag(Request $request)
    {
        $hashtag = Tag::find($request->id);
        $hashtag->Name = $request->HashtagName;
        $hashtag->save();
        return redirect()->route('hashtags');
    }
    public function delete_Hashtag($id)
    {
        $hashtag = Tag::find($id);
        $hashtag->delete();
        return redirect()->route('hashtags');
    }
}
