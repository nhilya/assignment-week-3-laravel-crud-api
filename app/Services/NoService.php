<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NoService
{
    /**
     * Get the rejection reason from the API
     * Include logic for error handling using try and catch method
     * Include logic for fallback using fallback method
     *
     * @return string
     */
    public function getRejectionReason()
    {
        // [1] Try to make a GET request to the API, using try and catch method
        try {
            // [2] Make a GET request to the API
            // The API returns JSON like {"no": "No."}
            $response = Http::get('https://naas.isalman.dev/no');

            // [3] Check if request was successful and return the value
            if ($response->successful()) {
                // Return the 'no' key, or 'No.' if it's missing
                return $response->json('reason') ?? 'No.';
            }
        } catch (\Exception $e) {
            // [4] Fallback if something goes wrong
            return 'Default message: Computer says no.';
        }

        return 'Default message: Computer says no.';
    }
}
