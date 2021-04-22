<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\Post;

class PostController extends Controller
{
    use ApiResponser;

    public function getPosts(Request $request)
    {
        $posts = Post::select('id', 'name', 'image', 'created_at')->active()->orderBy('lft')->get();

        return $this->success($posts);
    }

    public function show(Request $request)
    {
        $post = Post::findOrFail($request->id);

        return $this->success($post);
    }

}
