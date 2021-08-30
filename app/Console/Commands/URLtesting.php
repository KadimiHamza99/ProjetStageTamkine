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
                $ch=curl_init($url);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $response = curl_exec($ch);
                $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if($responseCode == 200){
                    if($data->statut != 1 || $data->response_message_id != 200){
                        $sqls="UPDATE `platforms` SET `statut`=1,`response_message_id`=$responseCode WHERE `id`=$id";
                        mysqli_query($link,$sqls);
                    }
                }else if($response=false || $responseCode > 399 || $responseCode==0){
                    if($data->statut != 0 || $data->response_message_id != $responseCode){
                        $sqlf = "UPDATE `platforms` SET `statut`=0,`response_message_id`=$responseCode WHERE `id`=$id";
                        mysqli_query($link,$sqlf);
                        $error=new PlatformsController();
                        $error->warning();
                    }
                }
            }
        }
    }
}
