<?php

namespace App\Models;

use CodeIgniter\Model;

class Api_daerah_model extends model
{
    public function provinsi()
    {
        $client = \Config\Services::curlrequest();

        $response = $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function get_id_provinsi($id_provinsi)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$id_provinsi.'');
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function get_id_kota($idkota)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/kota/'.$idkota.'');
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function get_id_kecamatan($idkecamatan)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$idkecamatan.'');
        $result = json_decode($response->getBody(), true);
        return $result;
    }

    public function get_id_desa($iddesa)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->request('GET', 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$iddesa.'');
        $result = json_decode($response->getBody(), true);
        return $result;
    }

   

}