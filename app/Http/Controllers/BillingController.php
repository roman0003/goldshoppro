<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Goldprice;
use App\Models\Inventory;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
 
class BillingController extends Controller
{
    public function index()
    {
        $bills = Billing::latest()->get();
        return view('billing.index', compact('bills'));
    }
 
    public function create()
    {
        // Fetch inventory with price
        $inventories = Inventory::all();
        $customers = Customer::all();
        return view('billing.create', compact('inventories','customers'));
    }
 
    public function store(Request $request)
    {
        

        
        $inventory = Inventory::find($request->inventory_id);
 
        if ($inventory->quantity < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }
 
        $total = $inventory->selling_price * $request->quantity;

        $customer = Customer::firstOrCreate(
            ['phone' => $request->customer_phone],
            ['name' => $request-> customer_name]
        );
 
 
        // Create Bill
        Billing::create([
            'customer_id' => $customer->id,
            'metal_type' => $inventory->metal_type,
            'price_per_tola' => $inventory->selling_price,
            'quantity' => $request->quantity,
            'total' => $total,
        ]);
 
        // Reduce Inventory
        $inventory->quantity -= $request->quantity;
        $inventory->save();
 
        return redirect()->route('billing.index')
            ->with('success', 'Bill created and inventory updated successfully!');
    }
 
    public function invoice($id)
    {
        $bill = Billing::with('inventory')->findOrFail($id);
        return view('billing.invoice', compact('bill'));
    }
 
    public function downloadPdf($id)
    {
        $bill = Billing::with('inventory')->findOrFail($id);
        $pdf = Pdf::loadView('billing.invoice_pdf', compact('bill'));
        return $pdf->download('invoice_'.$bill->id.'.pdf');
    }
}