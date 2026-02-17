<?php
 
namespace App\Http\Controllers;
 
use App\Models\Billing;
use App\Models\Inventory;
 
class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Billing::sum('total');
        $totalBills = Billing::count();
        $totalInventory = Inventory::sum('quantity');
        $lowStock = Inventory::where('quantity', '<', 5)->count();
 
        return view('dashboard', compact(
            'totalSales',
            'totalBills',
            'totalInventory',
            'lowStock'
        ));
    }
}