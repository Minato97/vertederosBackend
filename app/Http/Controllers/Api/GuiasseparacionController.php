<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guiasseparacion;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GuiasseparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $guiasseparacions = Guiasseparacion::query()->get();

        return response()->json([
            'success' => true,
            'data' => $guiasseparacions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'titulo' => 'nullable|string|max:45',
            'descripcion' => 'nullable|string|max:255',
            'manuel_PDF' => 'nullable|string|max:45'
        ]);

        $guiasseparacion = Guiasseparacion::create($validated);

        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Guiasseparacion created successfully',
            'data' => $guiasseparacion
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guiasseparacion $guiasseparacion): JsonResponse
    {
        // Cargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'data' => $guiasseparacion
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guiasseparacion $guiasseparacion): JsonResponse
    {
        $validated = $request->validate([
            'titulo' => 'nullable|string|max:45',
            'descripcion' => 'nullable|string|max:255',
            'manuel_PDF' => 'nullable|string|max:45'
        ]);

        $guiasseparacion->update($validated);

        // Recargar relaciones
        // No hay relaciones para cargar

        return response()->json([
            'success' => true,
            'message' => 'Guiasseparacion updated successfully',
            'data' => $guiasseparacion
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guiasseparacion $guiasseparacion): JsonResponse
    {
        $guiasseparacion->delete();

        return response()->json([
            'success' => true,
            'message' => 'Guiasseparacion deleted successfully'
        ]);
    }
}
