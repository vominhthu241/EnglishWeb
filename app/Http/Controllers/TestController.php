<?php

namespace App\Http\Controllers;

use App\Test;
use App\Content;
use App\Question;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $test = Test::latest();
        // return view('admin.layout.master');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $test = new Test();
        $test->name     = $request->testname;
        $test->type_test    = $request->testtype;
        $test->save();
        $test_id= $test->id;
        if($test_id) {
            $content = new Content();
            $content->time = $request->times;
            $content->content = $request->content;
            $content->save();
            $content_id = $content->id;
            if($content_id) {
                $question = new Question();
                $question->question     = $request->question;
                $question->content_id   = 1;
                $question->save();
                $id = $question->id;
                if($id == true){
                    $answer = new Answer();
                    $correct = $request->correct;
                    if($correct=!null){
                        $corrects = $request->correct;
                    }
                    else {
                        $corrects = 0;
                    }
                    foreach($request->answers as $key=> $v){
                        $data = array(
                            'answer' => $request->answers[$key],
                            'iscorrect'=>$corrects,
                            'question_id'=>$id,
                        ); 
                        Answer::insert($data);
                    }          
                }
            }
        }
        \Session::flash('flash_message','Added successful!!!');
        return redirect()->back()->with('thongbao','Success!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
