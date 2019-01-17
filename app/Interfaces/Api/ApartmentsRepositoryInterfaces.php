<?php

namespace App\Interfaces\Api;

use Illuminate\Http\Request;

interface ApartmentsRepositoryInterfaces
{
    public function getAllApartments();

    public function getDetailByToken($access_token);

    public function deleteByToken($access_token);

    public function storeApartment(Request $requestData);

    public function updateApartment(Request $requestData, $access_token);
}