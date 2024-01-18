<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class AdzanController extends Controller
{
    public function index($city, $year, $month)
    {
        $filePath = storage_path("adzan" . DIRECTORY_SEPARATOR . $city . DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR . $month . ".json");

        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $jsonData = json_decode($jsonContent, true);
            return response()->json($jsonData);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }
}
