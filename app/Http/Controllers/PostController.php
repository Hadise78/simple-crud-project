<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;

use App\Jobs\ProcessPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts=Post::all();
      

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users=User::all();

        return view('post.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $validated=$request->validate([

            'title'=>  ['required','min:5' ],
            
            'body'=> ['required','max:250'],
            
            'user_id'=>['required'],
            
          
            
                    ]);
        

        $post=Post::create($request->all());

        ProcessPost::dispatch($post);

        return redirect()->route('post.index')->with('success','پست با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $post=Post::find($id);

        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $post=Post::find($id);
        $users=User::all();

        return view('post.edit',compact('post','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        


        $validated=$request->validate([

            'title'=>  ['required','min:5' ],
            
            'body'=> ['required','max:250'],
            
            'user_id'=>['required'],
            
          
            
                    ]);
        




$post=Post::find($id);

$post->update($request->all());

return redirect()->route('post.index')->with('success','پست با موفقیت ویرایش شد');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Post::destroy($id);
        return redirect()->route('post.index')->with('success','پست با موفقیت پاک شد');;
    }
}
