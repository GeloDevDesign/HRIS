<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = Position::with(['department']);

        if ($request->filled('s')) {
            $search = $request->s;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('department', function ($q2) use ($search) {
                        $q2->where('department_name', 'like', '%' . $search . '%');
                    });
            });
        }

        $positions = $query->paginate($request->per_page ?? 10);

        $filters = [];

        return view('organization.position.index', compact('positions', 'filters'));

    }
}
