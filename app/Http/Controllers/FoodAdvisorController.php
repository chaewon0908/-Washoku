<?php

namespace App\Http\Controllers;

use App\Services\FoodAdvisorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodAdvisorController extends Controller
{
    public function __construct(private FoodAdvisorService $foodAdvisor)
    {
    }

    public function recommend(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'preferences' => ['nullable', 'array'],
            'preferences.category' => ['nullable', 'string', 'max:50'],
            'preferences.budget_max' => ['nullable', 'integer', 'min:0', 'max:10000'],
            'preferences.budget_strict' => ['nullable', 'boolean'],
            'preferences.calorie_max' => ['nullable', 'integer', 'min:0', 'max:5000'],
            'preferences.dietary' => ['nullable', 'string', 'in:any,vegetarian,seafood,meat'],
            'preferences.spice' => ['nullable', 'string', 'in:any,mild,spicy'],
            'preferences.portion' => ['nullable', 'string', 'in:any,light,hearty'],
            'preferences.exclude_ids' => ['nullable', 'array'],
            'preferences.exclude_ids.*' => ['integer'],
            'action' => ['nullable', 'string', 'in:rotate,refine_cheaper,refine_lowcal,refine_both'],
            'message' => ['nullable', 'string', 'max:500'],
        ]);

        $preferences = $validated['preferences'] ?? [];
        $message = $validated['message'] ?? null;
        $action = $validated['action'] ?? null;
        $user = Auth::user();

        $result = $this->foodAdvisor->recommend($preferences, $user, $message, $action);

        return response()->json($result);
    }
}
