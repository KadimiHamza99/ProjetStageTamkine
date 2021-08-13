<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PlatformsController;

class URLtesting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'URL:testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('Africa/Casablanca');
        $datas=DB::table('platforms')->get();
        if(!$datas->isEmpty()){
                $u = 'localhost';
                $username = 'root';
                $password = '';
                $dbName = 'platformstamkine';
                $link=mysqli_connect($u, $username,$password,$dbName) or die('echec de connection');
            foreach($datas as $data){
                $url=$data->url;
                $id=$data->id;
                $ch = curl_init($url);
                curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
                curl_setopt($ch,CURLOPT_HEADER,true);
                curl_setopt($ch,CURLOPT_NOBODY,true);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                // Récupérer la réponse
                $response = curl_exec($ch);
                // Fermer la session cURL
                curl_close($ch);
                if($response==true){
                    if($data->statut != 1){
                        $sqls="UPDATE platforms SET statut=1 WHERE id=$id";
                        mysqli_query($link,$sqls);
                    }
                }else if($response==false){
                    if($data->statut != 0){
                        $sqlf = "UPDATE platforms SET statut=0 WHERE id=$id";
                        mysqli_query($link,$sqlf);
                        $error=new PlatformsController();
                        $error->warning();
                    }
                }
            }
        }

    }
}
