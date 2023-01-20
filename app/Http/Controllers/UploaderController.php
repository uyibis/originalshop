<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request){
       // dd($request->json()->all());
        $request->validate([
            'associate' => 'required',
            'id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $ass=$request->image;
       // dd($ass);

        $input = $request->all();
        $path="";
        if ($image = $request->file('image')) {
            $destinationPath = 'images/uploads';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
            $path=$destinationPath .'/'.$postImage;
        }
        $info=['associate'=>$request->associate,'associate_id'=>$request->id,'path'=>asset("${path}")];

        if(Request::exists(''))

      // return  $info;
         $up=Upload::where('associate_id',$info['associate_id'])->first();
         if ($up){
             //update record
            $exp= explode("8000/",$up->path);
             if(\File::exists(public_path($exp[1]))){
                 \File::delete(public_path($exp[1]));
             }
            ///return $exp;
             $record=Upload::whereId($up->id)->update($info);
             if($record==1){
                 $up->path=$info['path'];
                 $record=($up);
             }
         }else{
             // create new record
            $record=Upload::create($info);
         }
        return $record;
        //return redirect()->route('posts.index')->with('success','Post created successfully.');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->json()->all());
        $request->getContent()->validate([
            'associate' => 'required',
            'id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $ass=$request->image;
        dd($ass);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }

        Post::create($input);

        return redirect()->route('posts.index')->with('success','Post created successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
