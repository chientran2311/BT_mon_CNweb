<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with(['medicine' => function ($query) {
            $query->select('medicine_id', 'name', 'price'); // Chỉ lấy các cột từ bảng medicines
        }])
        ->get(['sales_id', 'medicine_id', 'quantity', 'sale_date', 'customer_phone']);// Chỉ lấy các cột cần thiết từ sales

        return view('prac01.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
