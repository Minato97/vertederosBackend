<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estatus;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $estatuss = Estatus::query()->get();

        return response()->json([
            'success' => true,
            'data' => $estatuss
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'estatus' => 'nullable|string|max:45'
        ]);

        $estatus = Estatus::create($validated);

        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Estatus created successfully',
            'data' => $estatus
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estatus $estatus): JsonResponse
    {
        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'data' => $estatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estatus $estatus): JsonResponse
    {
        $validated = $request->validate([
            'estatus' => 'nullable|string|max:45'
        ]);

        $estatus->update($validated);

        // Recargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Estatus updated successfully',
            'data' => $estatus
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estatus $estatus): JsonResponse
    {
        $estatus->delete();

        return response()->json([
            'success' => true,
            'message' => 'Estatus deleted successfully'
        ]);
    }
}
