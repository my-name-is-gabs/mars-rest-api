<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSetRequest;
use App\Models\Set;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HttpResponse;

    public function index($user_id)
    {
        $set = Set::where('user_id', $user_id)->get();

        if (empty($set)) {
            return $this->error("Error in fetching data", 404);
        }

        return $this->success($set, "All data was fetched successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSetRequest $request)
    {

        $created_set = Set::create([
            "name" => $request->name,
            "description" => $request->description,
            "reviewer" => $request->reviewer,
            "user_id" => $request->user_id
        ]);

        if(!$created_set) return $this->error("There is an error encoutered");

        return $this->success($created_set, "Set created successfully", 201);
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