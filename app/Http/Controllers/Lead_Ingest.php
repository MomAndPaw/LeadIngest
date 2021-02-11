<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\leads;

class Lead_Ingest extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $source)
    {

        $data['pet_name'] = $request->pet_name;
        $data['pet_age'] = $request->pet_age;
        $data['pet_weight'] = $request->pet_weight;
        $data['pet_activity'] = $request->pet_activity;
        $data['pet_body_type'] = $request->pet_body_type;
        $data['pet_breed'] = $request->pet_breed;
        $data['pet_genus'] = $request->pet_genus;
        $data['parent_name'] = $request->parent_name;
        $data['parent_email'] = $request->parent_email;
        $data['parent_state'] = $request->parent_state;
        $data['lead_source'] = $request->lead_source;

        $lead = new leads($data);
        $lead->save();



        return $data;
    }


    public function get_refresh_token()
    {
        $post = [
            'code'  => '1000.d414fda29d39c3a4105bd04beefaaf66.db0fe698c85456eefa283c720419dd51',
            'redirect_uri' => 'https://example.com/callbacl',
            'client_id'   => '1000.IVJT2V6U1I7CUG7MP0HKH5QXY31K8T',
            'client_secret'   => 'c662531d1e424c8a341ffd3d6a301ae11af39edca3',
            'grant_type'   => 'authorization_code'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://accounts.zoho.com/oauth/v2/token");
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('content-Type: application/x-www-form-urlencoded'));


        $response = curl_exec($ch);

        dd($response);
        $response - json_encode($response);

        dd($response);

    }
    public function get_refresh_token2()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL=>"https://accounts.zoho.eu/oauth/v2/token?refresh_token=1000.bcc98d358eaa3dc3852714b9f971dc0d.1b1da92c15619b94e21684361cb780b0&client_id=1000.IVJT2V6U1I7CUG7MP0HKH5QXY31K8T&client_secret=c662531d1e424c8a341ffd3d6a301ae11af39edca3&grant_type=refresh_token",
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
            echo $response;
        }

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
