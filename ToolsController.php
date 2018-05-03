<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tool; // Menambah Model Tool kedalam Controller

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_tool = Tool::all();
        return view('manage_tool_views/list',compact('data_tool'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage_tool_views/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tool = new Tool();
        $tool->tool_name = $request->tool_name;
        $tool->tool_count = $request->tool_count;
        $tool->save();
        echo "Data Saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_tool = Tool::where('tool_id',$id)->firstOrFail();
        return view('manage_tool_views/edit',compact('data_tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tool= Tool::where('tool_id',$id)->firstOrFail();
        $tool->tool_name=$request->tool_name;
        $tool->tool_count=$request->tool_count;
        $tool->save();
        return redirect('tool');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Tool::find($id);
        $tool->delete();
        return redirect('tool')->with('success','Information has been  deleted');
    }
}
