<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // $shortLinks = ShortLink::latest()->get();
        // return view('home', compact('shortLinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url|unique:short_links|',
            'code' => 'required|unique:short_links|'
         ]);

         $data = new ShortLink();
         $data->user_id = Auth::id();
         $data->link = $request->link;
         $data->code = $request->code;
         $data->save();

         return redirect()->back()
              ->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        ShortLink::where('code', $code)->increment('click_count',1);
        return redirect($find->link);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $data = ShortLink::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request)
    {

        $request->validate([
            'link' => 'required|url|unique:short_links,link,'.$request->id ,
            'code' => 'required|unique:short_links,code,'.$request->id
         ]);

        $data = ShortLink::find($request->id);
        $data->user_id = Auth::id();
        $data->link = $request->link;
        $data->code = $request->code;
        $data->save();
        return redirect()->back()
             ->with('success', 'Shorten Link Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $find = ShortLink::find($id)->delete();
        return redirect()->back()
             ->with('success', 'Shorten Link Delete Successfully!');
    }


    /**
     * Count the specified resource from storage.
     *
     */
    public function copyCount($id)
    {
        ShortLink::find($id)->increment('copy_count',1); // For Increment

        $data = ShortLink::find($id); // For instant Count
        return response()->json($data);
    }





}
