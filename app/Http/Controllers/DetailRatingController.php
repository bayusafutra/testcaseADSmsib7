<?php

namespace App\Http\Controllers;

use App\Models\DetailRating;
use App\Http\Requests\StoreDetailRatingRequest;
use App\Http\Requests\UpdateDetailRatingRequest;
use Illuminate\Http\Request;

class DetailRatingController extends Controller
{
    public function rating(Request $request)
    {
        $capek = DetailRating::where('id', $request->detail)->first();
        $validatedData["nilai"] = $request->rating;
        $validatedData["komentar"] = $request->komentar;
        $validatedData["barang_id"] = $request->id;
        $validatedData["status"] = 2;
        $capek->update($validatedData);

        return back();
    }
}
