<?php

namespace App\Http\Controllers;

use App\Models\Set;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HttpResponse;

    public function index($id)
    {
        $set = Set::where('user_id', $id);

        if (!$set) {
            return $this->error("Error in fetching data", 404);
        }

        return $this->success($set, "Success in fetching all set data" , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}