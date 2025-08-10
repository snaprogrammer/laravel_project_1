<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    
    public function index(Request $request)
    {
        
        $query = Content::query();

        if ($search = $request->query('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $contents = $query->orderBy('created_at', 'desc')->paginate(5);

        return response()->json($contents);
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        return response()->json($content);
    }
}