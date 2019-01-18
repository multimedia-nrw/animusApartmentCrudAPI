<?php
/**
 * Created by PhpStorm.
 * User: Malay Mehta
 * Date: 20-04-2018
 * Time: 03:24 PM
 */

namespace App\Repositories\Api;

use App\Interfaces\Api\ApartmentsRepositoryInterfaces;
use App\Models\Apartments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\ApartmentCreated;
use Illuminate\Support\Facades\Mail;

class ApartmentsRepository implements ApartmentsRepositoryInterfaces
{

    public function getAllApartments()
    {
        return Apartments::all();
    }

    public function getDetailByToken($access_token)
    {
        $apartment = Apartments::byToken($access_token)->get();
        return $apartment;
    }

    public function deleteByToken($access_token)
    {
        Apartments::byToken($access_token)->delete();
        return true;
    }

    public function storeApartment(Request $request)
    {
        $requestData = $request->all();
        $requestData["move_in_date"] = Carbon::parse($requestData["move_in_date"])->format("Y-m-d");
        $requestData['access_token'] = str_random(16);
        dd($requestData);
        $apartment = Apartments::create($requestData);
        Mail::to($requestData['contact_email_address'])->send(new ApartmentCreated($apartment));
        return $apartment;
    }

    public function updateApartment(Request $request, $access_token)
    {
        $apartment_info = Apartments::where("access_token", $access_token)->first();
        // Validate if the access_token is correct to match an existing record.
        if (!$apartment_info) {
            return false;
        }
        $requestData = $request->all();
        $apartment_info->update($requestData);
        return true;

    }
}