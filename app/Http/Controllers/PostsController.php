<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    public function create(Request $request)
    {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move('images', $filename);

        Post::create([
            'image' => $filename,
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'created_by' => auth()->user()->id, // Hier ggf. auth()->user()->id einsetzen
        ]);

        return redirect('/admin/posts');
    }

    public function delete_post(Request $request)
    {

        $post = Post::find($request->id);
        $post->delete(); // optional chaining: falls nicht gefunden, kein Fehler
        return redirect('/admin/posts');
    }
}
