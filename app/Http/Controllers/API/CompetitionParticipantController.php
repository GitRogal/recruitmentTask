<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompetitionParticipantRequest;
use App\Models\CompetitionParticipant;
use Illuminate\Http\JsonResponse;

class CompetitionParticipantController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetitionParticipantRequest $request): JsonResponse
    {
        try {
            // save data to db
            CompetitionParticipant::create($request->validated());

            // save image file to folder
            $request->file('receiptPhoto')->store('receiptPhotos', 'public');

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            // add error to logs
            report($e);

            return response()->json([
                'errors' => 'An error occurred while saving data. Please try again or contact your administrator.',
                'status' => 'error',
            ], 400);
        }
    }
}
