<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Warning;

class PlatformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function warning(){
        Mail::to('hamza.kadimi@uit.ac.ma')->send(new Warning);
        $datas = Platform::paginate(9);
        return view('index')->with('datas',$datas);
    }
    public function nombre()
    {
        $datas = Platform::paginate(6);
        return view('home')->with('datas',$datas);
    }

    public function liste()
    {
        $datas = Platform::paginate(5);
        return view('platforms.listePlatforms')->with('datas',$datas);
    }

    public function index()
    {
        $datas = Platform::all();
        $rows = User::all();
        return view('index',compact('datas','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platforms.createPlatform');
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
            'nom'=>'required',
            'url'=>'required',
            'logo'=>'image|nullable'
        ],$messages);
        $plat=new Platform();
        $plat->nom=$request->input('nom');
        $plat->url=$request->input('url');
        if($request->hasFile('logo')){
            // $logoName=$request->file('logo')->getClientOriginalName();
            // $request->file('logo')->storeAS('Logos',$logoName);
            // $plat->logo=$logoName;
            $destination_path='logos/';
            $logo=$request->file('logo');
            $logo_name=$logo->getClientOriginalName();
            $path=$logo->move($destination_path,$logo_name);
            $plat->logo=$logo_name;
        }
        $url=$request->input('url');
        $ch = curl_init($url);
        // Définir les options
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($ch,CURLOPT_HEADER,true);
        curl_setopt($ch,CURLOPT_NOBODY,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        // Récupérer la réponse
        $response = curl_exec($ch);

        // Fermer la session cURL
        curl_close($ch);
        if($response==true){
            $plat->statut=1;
        }else if($response==false){
            $plat->statut=0;
        }
        $plat->save();
        return redirect(route('platforms.create'));
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
        $platform=Platform::find($id);
        return view('platforms.editplatform')->with('platform',$platform);
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
        $platform=Platform::find($id);
        $this->validate($request,[
            'nom'=>'required',
            'url'=>'required',
            'logo'=>'image|nullable'
        ]);
        $platform->nom=$request->input('nom');
        $platform->url=$request->input('url');
        if($request->hasFile('logo')){
            $logoName=$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move('logos/',$logoName);
            $platform->logo=$logoName;
        }
        $url=$request->input('url');
        $ch = curl_init($url);
        // Définir les options
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($ch,CURLOPT_HEADER,true);
        curl_setopt($ch,CURLOPT_NOBODY,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        // Récupérer la réponse
        $response = curl_exec($ch);

        // Fermer la session cURL
        curl_close($ch);
        if($response==true){
            $platform->statut=1;
        }else if($response==false){
            $platform->statut=0;
        }
        $platform->save();
        return redirect(route('listePlatforms'))->with('msg','Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $platDelete=Platform::find($id);
        $platDelete->destroy($id);
        return redirect(route('listePlatforms'))->with('msg','Plaform Deleted');
    }
}
