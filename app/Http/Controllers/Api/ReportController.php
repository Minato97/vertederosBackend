<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $reports = Report::query()->with(['tiporesiduo', 'user', 'estatus', 'centrosreciclaje'])->get();

        return response()->json([
            'success' => true,
            'data' => $reports
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'ubicación' => 'nullable|string|max:255',
            'nivel_gravedad' => 'nullable|string|max:45',
            'comentario' => 'nullable|string|max:255',
            'foto_reporte' => 'nullable|string|max:255',
            'foto_cierre' => 'nullable|string|max:255',
            'tipoResiduo_id' => 'required|integer|exists:tipoResiduo,id',
            'users_id' => 'required|integer|exists:users,id',
            'estatus_id' => 'required|integer|exists:estatus,id',
            'centrosReciclaje_id' => 'nullable|integer|exists:centrosReciclaje,id'
        ]);

        $report = Report::create($validated);

        // Cargar relaciones
        $report->load(['tiporesiduo', 'user', 'estatus', 'centrosreciclaje']);

        return response()->json([
            'success' => true,
            'message' => 'Report created successfully',
            'data' => $report
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report): JsonResponse
    {
        // Cargar relaciones
        $report->load(['tiporesiduo', 'user', 'estatus', 'centrosreciclaje']);

        return response()->json([
            'success' => true,
            'data' => $report
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report): JsonResponse
    {
        $validated = $request->validate([
            'ubicación' => 'nullable|string|max:255',
            'nivel_gravedad' => 'nullable|string|max:45',
            'comentario' => 'nullable|string|max:255',
            'foto_reporte' => 'nullable|string|max:255',
            'foto_cierre' => 'nullable|string|max:255',
            'tipoResiduo_id' => 'required|integer|exists:tipoResiduo,id',
            'users_id' => 'required|integer|exists:users,id',
            'estatus_id' => 'required|integer|exists:estatus,id',
            'centrosReciclaje_id' => 'nullable|integer|exists:centrosReciclaje,id'
        ]);

        $report->update($validated);

        // Recargar relaciones
        $report->load(['tiporesiduo', 'user', 'estatus', 'centrosreciclaje']);

        return response()->json([
            'success' => true,
            'message' => 'Report updated successfully',
            'data' => $report
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report): JsonResponse
    {
        $report->delete();

        return response()->json([
            'success' => true,
            'message' => 'Report deleted successfully'
        ]);
    }
}
