<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ResponsablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::paginate(5);
        return view('responsables.listeResponsables')->with('datas',$datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responsables.createResponsable');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'required'=>'Le champ est obligatoire'
        ];
        $this->validate($request,[
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=>['required', 'string', 'min:8', 'confirmed']
        ],$messages);
        $respo=new User();
        $respo->name=$request->input('name');
        $respo->email=$request->input('email');
        $respo->password= Hash::make($request->password);
        $respo->save();
        return redirect(route('responsables.create'));
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
        $respoDelete=User::find($id);
        if($respoDelete->name=="admin"){
            return redirect(route('responsables.index'))->with('msg','Impossible To Delete The Admin');
        }else{
            $respoDelete->destroy($id);
            return redirect(route('responsables.index'))->with('msg','Responsable Deleted');
        }
    }
}
