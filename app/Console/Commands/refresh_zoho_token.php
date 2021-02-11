<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Models\api_token;
//use Illuminate\Support\Facades\DB;


class refresh_zoho_token extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:refresh_token';

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

        // https://accounts.zoho.in/oauth/v2/token?refresh_token=1000.4e8b3ba703937d4fcdf0dd4ff75d5588.71c8021b006a01fcc555513dbbf34a3f&client_id=1000.IVJT2V6U1I7CUG7MP0HKH5QXY31K8T&client_secret=c662531d1e424c8a341ffd3d6a301ae11af39edca3&grant_type=refresh_token

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL=>"https://accounts.zoho.in/oauth/v2/token?refresh_token=1000.4e8b3ba703937d4fcdf0dd4ff75d5588.71c8021b006a01fcc555513dbbf34a3f&client_id=1000.IVJT2V6U1I7CUG7MP0HKH5QXY31K8T&client_secret=c662531d1e424c8a341ffd3d6a301ae11af39edca3&grant_type=refresh_token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            $response = json_decode($response);
//            dd($response->access_token);

//             $token =  DB::table("api_token")->where("id", "1")->get();
//            $token['access_token'] = $response->access_token;
//
//           $token->save();

            $token = api_token::all()->where('id', '1')->first();
            $token->access_token = $response->access_token;
            $token->save();

            dd($token);
        }

        return 0;
    }




}
