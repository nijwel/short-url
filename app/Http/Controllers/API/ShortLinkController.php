<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shortLinks = ShortLink::where('user_id', Auth::id())->latest()->get();
        return response()->json([
            'shortLinks' => $shortLinks,
            'status' => 200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required|url|unique:short_links|',
            'code' => 'required|unique:short_links|'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ]);
        }

         $data = new ShortLink();
         $data->user_id = Auth::id();
         $data->link = $request->link;
         $data->code = $request->code;
         $data->save();

         return response()->json([
            'success' => 'Shorten Link Generated Successfully!',
             'status' => 200
         ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shortLink = ShortLink::find($id);
        return response()->json([
            'shortLink' => $shortLink,
            'status' => 200
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'link' => 'required|url|unique:short_links,link,'.$id ,
            'code' => 'required|unique:short_links,code,'.$id
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ]);
        }

         $data = ShortLink::find($id);
         $data->link = $request->link;
         $data->code = $request->code;
         $data->save();

         return response()->json([
            'success' => 'Shorten Link Update Successfully!',
             'status' => 200
         ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ShortLink::find($id)->delete();
        return response()->json([
            'success' => 'Shorten Link Delete Successfully!',
             'status' => 200
        ]);
    }


    public function shortenLink($code)
    {
        if(!ShortLink::where('code', $code)->exists()) {
            return response()->json([
                'message' => 'Link Not Found',
                'status' => 404
            ]);
        }

        $find = ShortLink::where('code', $code)->first();
        ShortLink::where('code', $code)->increment('click_count',1);
        return response()->json([
            'link' => $find->link,
            'status' => 200
        ]);
    }
}
