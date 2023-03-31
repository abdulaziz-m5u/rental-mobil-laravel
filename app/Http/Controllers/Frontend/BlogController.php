<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::where('status', 1);

        if ($q = $request->query('s')) {
			$q = str_replace('-', ' ', Str::slug($q));
			
			$blogs = $blogs->whereRaw('MATCH(title, slug, excerpt, description) AGAINST (? IN NATURAL LANGUAGE MODE)', [$q]); 
            if($blogs->get()->isEmpty()) {
                $blogs = Blog::where('status', 1);
            }
        }
        
        $blogs = $blogs->get();

        return view('frontend.blog.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $blogs = Blog::latest()->get()->take(6);

        return view('frontend.blog.single', compact('blog','blogs'));
    }
}
