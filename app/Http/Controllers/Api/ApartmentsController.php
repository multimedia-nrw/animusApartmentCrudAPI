<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\ApartmentsRepositoryInterfaces;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    protected $apartmentsRepository;

    public function __construct(ApartmentsRepositoryInterfaces $apartmentsRepository)
    {
        $this->apartmentsRepository = $apartmentsRepository;
    }

    public function index()
    {
        $apartments = $this->apartmentsRepository->getAllApartments();

        if (count($apartments) == 0) {
            return response()->json(array('status' => 100, 'message' => "No Records for Apartments Found."));
        }
        return response()->json(array('status' => 200, 'data' => $apartments));

    }

    public function show($access_token)
    {
        $apartment = $this->apartmentsRepository->getDetailByToken($access_token);
        if (count($apartment) == 0) {
            return response()->json(array('status' => 100, 'message' => "Invalid Token Request"));
        }
        return response()->json(array('status' => 200, 'message' => null, 'data' => $apartment));

    }

    public function destroy($access_token)
    {
        $this->apartmentsRepository->deleteByToken($access_token);
        return response()->json(array('status' => 200, 'message' => "Apartment deleted Successfully"));
    }

    public function store(Request $request)
    {
        try {
            $apartment = $this->apartmentsRepository->storeApartment($request);
            return response()->json(array('status' => 200, 'message' => "Apartment added successfully!"));

        } catch (\Exception $e) {
            return response()->json(array('status' => 100, 'message' => $e->getMessage()));
        }
    }

    public function update(Request $request, $access_token)
    {
        try {
            $this->apartmentsRepository->updateApartment($request, $access_token);
            return response()->json(array('status' => 200, 'message' => "Apartment updated successfully!"));

        } catch (\Exception $e) {
            return response()->json(array('status' => 100, 'message' => $e->getMessage()));
        }
    }
}