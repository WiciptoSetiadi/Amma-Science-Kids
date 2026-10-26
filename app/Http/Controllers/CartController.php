<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Tampilkan halaman keranjang belanja.
     */
    public function index(): View
    {
        $cart = session()->get('cart', []);

        $subtotal = 0;
        $totalItems = 0;

        foreach ($cart as $item) {
            $subtotal += ($item['price'] * $item['quantity']);
            $totalItems += $item['quantity'];
        }

        return view('cart', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'totalItems' => $totalItems,
        ]);
    }

    /**
     * Tambah item program/produk ke keranjang.
     */
    public function add(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'quantity' => 'nullable|integer|min:1',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $program = Program::findOrFail($validated['program_id']);
        $cart = session()->get('cart', []);
        $id = (string) $program->id;
        $quantity = $validated['quantity'] ?? 1;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $subtitle = $validated['subtitle'] ?? ($program->target_age ? 'Target: '.$program->target_age : 'Program Eksperimen Sains');
            $cart[$id] = [
                'id' => $program->id,
                'program_id' => $program->id,
                'title' => $program->title,
                'category' => $program->category ?? 'Program Sains',
                'image' => $program->image,
                'subtitle' => $subtitle,
                'price' => (float) $program->price,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', "{$program->title} berhasil ditambahkan ke keranjang!");
    }

    /**
     * Update jumlah qty (+ atau -).
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (! isset($cart[$id])) {
            return redirect()->route('cart.index')->with('error', 'Item tidak ditemukan di keranjang.');
        }

        $action = $request->input('action');

        if ($action === 'increase') {
            $cart[$id]['quantity'] += 1;
        } elseif ($action === 'decrease') {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            } else {
                unset($cart[$id]);
            }
        } elseif ($request->has('quantity')) {
            $qty = max(1, (int) $request->input('quantity'));
            $cart[$id]['quantity'] = $qty;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui.');
    }

    /**
     * Hapus item dari keranjang.
     */
    public function remove(string $id): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    /**
     * Kosongkan keranjang.
     */
    public function clear(): RedirectResponse
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Keranjang telah dikosongkan.');
    }
}
