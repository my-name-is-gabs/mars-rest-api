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

        if (!$created_set) return $this->error("There is an error encoutered");

        return $this->success($created_set, "Set created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = Set::where("name", "like", "%".$request->search."%")->get();

        if (!$query || empty($query)) return $this->error("Set not found", 404);

        return response()->json(["data" => $query], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSetRequest $request, string $id)
    {
        $updated = Set::find($id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "reviewer" => $request->reviewer,
            "user_id" => $request->user_id
        ]);

        if (!$updated || empty($updated)) return $this->error("Error was encountered in updating the set", 401);

        return response()->json(["message" => "Update successful"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy = Set::destroy($id);

        if (!$destroy) return $this->error("Error encountered while deleting the set");

        echo $destroy;

        return response()->json(["message" => "Set was successfully deleted"], 200);
    }
}