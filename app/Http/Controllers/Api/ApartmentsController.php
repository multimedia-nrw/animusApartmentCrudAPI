<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\ApartmentsRepositoryInterfaces;
use Carbon\Carbon;
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

        // Filtering the apartments
        $apartments = $apartments->filter(function ($item) {
            $item->move_in_date = Carbon::parse($item->move_in_date)->format("d-m-Y");
            return $item;
        });

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
        return response()->json(array('status' => 200, 'data' => $apartment));

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

    public function update(Request $request)
    {
        try {
            $this->apartmentsRepository->updateApartment($request);
            return response()->json(array('status' => 200, 'message' => "Apartment updated successfully!"));

        } catch (\Exception $e) {
            return response()->json(array('status' => 100, 'message' => $e->getMessage()));
        }
    }
}