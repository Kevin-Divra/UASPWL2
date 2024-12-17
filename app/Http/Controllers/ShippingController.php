<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ShippingController extends Controller
{
    public function index() : View
    {
        $shipping = new Shipping;
        $shippings = $shipping->get_shipping()
                              ->latest()
                              ->paginate(10);
    
        
        return view('shipping.index', compact('shippings'));    
    }
    

    /**
     * Edit shipping information.
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $shipping = new Shipping;
        $data['shippings'] = $shipping->get_shipping()->where('shipping.id', $id)->firstOrFail();

        return view('shipping.edit', compact('data'));
    }
    

    /**
     * Update shipping status.
     * 
     * @param Request $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:ongoing,fail,completed',
        ]);

        $shipping = Shipping::findOrFail($id);
        $shipping->status = $request->input('status');
        $shipping->save();

        return redirect()->route('shipping.index')->with('success', 'Shipping status updated successfully!');
    }
}
