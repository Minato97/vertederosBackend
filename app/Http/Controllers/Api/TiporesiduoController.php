<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tiporesiduo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TiporesiduoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tiporesiduos = Tiporesiduo::query()->get();

        return response()->json([
            'success' => true,
            'data' => $tiporesiduos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'residuo' => 'nullable|string|max:45'
        ]);

        $tiporesiduo = Tiporesiduo::create($validated);

        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Tiporesiduo created successfully',
            'data' => $tiporesiduo
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiporesiduo $tiporesiduo): JsonResponse
    {
        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'data' => $tiporesiduo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiporesiduo $tiporesiduo): JsonResponse
    {
        $validated = $request->validate([
            'residuo' => 'nullable|string|max:45'
        ]);

        $tiporesiduo->update($validated);

        // Recargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Tiporesiduo updated successfully',
            'data' => $tiporesiduo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiporesiduo $tiporesiduo): JsonResponse
    {
        $tiporesiduo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tiporesiduo deleted successfully'
        ]);
    }
}
