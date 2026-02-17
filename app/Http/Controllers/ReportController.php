<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index'); // a simple reports dashboard
    }

    public function monthly()
    {
        $bills = Billing::whereMonth('created_at', now()->month)->get();

        $totalSales = $bills->sum('total');
        $totalQuantity = $bills->sum('weight');

        // daily sales
        $dailySales = $bills->groupBy(function($bill) {
            return $bill->created_at->format('d'); // group by day
        })->map(function($day) {
            return $day->sum('total');
        });

        return view('reports.monthly', compact('bills', 'totalSales', 'totalQuantity', 'dailySales'));
    }

    public function yearly()
{
    $currentYear = now()->year;
    $bills = Billing::whereYear('created_at', $currentYear)->get();
 
    // Total per metal
    $salesPerMetal = $bills->groupBy('metal_type')
        ->map(function($metalBills) {
            return [
                'quantity' => $metalBills->sum('quantity'),
                'total' => $metalBills->sum('total')
            ];
        });
 
    // Best-selling metal
    $bestMetal = $salesPerMetal->sortByDesc('quantity')->keys()->first();
 
    return view('reports.yearly', compact('bills','salesPerMetal','bestMetal'));
}
}
