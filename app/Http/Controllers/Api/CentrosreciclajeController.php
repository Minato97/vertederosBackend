<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Centrosreciclaje;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CentrosreciclajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $centrosreciclajes = Centrosreciclaje::query()->get();

        return response()->json([
            'success' => true,
            'data' => $centrosreciclajes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => 'nullable|string|max:45',
            'ubicacion' => 'nullable|string|max:60'
        ]);

        $centrosreciclaje = Centrosreciclaje::create($validated);

        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Centrosreciclaje created successfully',
            'data' => $centrosreciclaje
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Centrosreciclaje $centrosreciclaje): JsonResponse
    {
        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'data' => $centrosreciclaje
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centrosreciclaje $centrosreciclaje): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => 'nullable|string|max:45',
            'ubicacion' => 'nullable|string|max:60'
        ]);

        $centrosreciclaje->update($validated);

        // Recargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Centrosreciclaje updated successfully',
            'data' => $centrosreciclaje
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centrosreciclaje $centrosreciclaje): JsonResponse
    {
        $centrosreciclaje->delete();

        return response()->json([
            'success' => true,
            'message' => 'Centrosreciclaje deleted successfully'
        ]);
    }
}
