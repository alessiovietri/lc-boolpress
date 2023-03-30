<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Post;

// Helpers
use Exception;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsPerPage = 12;

        if (
            request()->input('per_page')
            &&
            (
                request()->input('per_page') == 12
                ||
                request()->input('per_page') == 24
                ||
                request()->input('per_page') == 36
            )
        ) {
            $postsPerPage = request()->input('per_page');
        }

        $posts = Post::with('category', 'tags')->paginate($postsPerPage);

        // foreach ($posts as $post) {
        //     if ($post->img) {
        //         $post->img = asset('storage/'.$post->img);
        //     }
        // }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Ok',
            'posts' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Versione prefe di Alessio
        // $post = Post::where('slug', $slug)->with('category', 'tags')->first();

        // if ($post) {
        //     return response()->json([
        //         'success' => true,
        //         'code' => 200,
        //         'message' => 'Ok',
        //         'post' => $post
        //     ]);
        // }
        // else {
        //     return response()->json([
        //         'success' => false,
        //         'code' => 404,
        //         'message' => 'Not Found'
        //     ]);
        // }

        // Altra versione
        try {
            $post = Post::where('slug', $slug)->with('category', 'tags')->firstOrFail();

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Ok',
                'post' => $post
            ]);
        }
        catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
