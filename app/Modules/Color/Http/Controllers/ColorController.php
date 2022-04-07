<?php

namespace App\Modules\Color\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Color\Models\Color;
use  Illuminate\Support\Facades\Auth;
class ColorController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $colors = Color::where('status', '!=', 'T')->get();
        return view('Color::list',compact('colors'));
    }

    public function addcolor()
    {
        return view('Color::color');
    }
    public function store(Request $request){



        $colors =new Color;
         $colors->color_name=$request->name;

         $colors->status=$request->status;
         $colors-> save();
        //  return "data insert sucessfully";
        return redirect('color');
        //  $data= Color::all();
        //   return view('Color::ff',['datas'=>$data]);

    }
    public function show()
    {
        // $data= Color::all();
        // return view('Color::list',['datas'=>$data]);
        $colors = Color::get();
        return view('Color::list',['colors'=>$colors]);
    }

    public function changeStatus(Request $r)
    {
        $colors = Color::find($r->id);
        $colors->status = $r->status;
        $colors->save();
        return response()->json(['success'=>'Status change successfully.']);
    }


    public function edit($id)
    {

      $colors = Color::find($id);
      return view('Color::edit',compact('colors'));
    }
    public function update(Request $request,$id)
    {
       $colors = Color::find($id);
       $colors->name = $request->name;
       $colors->save();

     return redirect('list');   //return redirect($url)->with('success', 'Data saved successfully!');

    }

    public function completedUpdate(Request $r)
    {
         $update = Color::find($r->id);
        $update->status='T';
        $update->save();
        return "success";
}

public function trashshow(){

    $colors = Color::where('status',array('T'))->get();

//  $colors = Color::where('status',array('Y','N'))->get();
    return view('Color::trash',['colors'=>$colors]);



}

}
