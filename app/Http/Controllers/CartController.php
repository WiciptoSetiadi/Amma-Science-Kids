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
        $maxItemQuantity = (int) config('cart.max_item_quantity');
        $cartWasAdjusted = false;

        if (! is_array($cart)) {
            $cart = [];
            $cartWasAdjusted = true;
        }

        foreach ($cart as $id => $item) {
            $quantity = is_array($item) && isset($item['quantity'])
                ? filter_var($item['quantity'], FILTER_VALIDATE_INT)
                : false;

            if ($quantity === false || $quantity < 1) {
                unset($cart[$id]);
                $cartWasAdjusted = true;

                continue;
            }

            if ($quantity > $maxItemQuantity) {
                $cart[$id]['quantity'] = $maxItemQuantity;
                $cartWasAdjusted = true;
            }
        }

        if ($cartWasAdjusted) {
            session()->put('cart', $cart);
            session()->flash('warning', 'Jumlah item di keranjang disesuaikan dengan batas maksimal '.$maxItemQuantity.' per program.');
        }

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
        $maxItemQuantity = (int) config('cart.max_item_quantity');
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'quantity' => ['nullable', 'integer', 'min:1', 'max:'.$maxItemQuantity],
            'subtitle' => 'nullable|string|max:255',
        ]);

        $program = Program::findOrFail($validated['program_id']);
        $cart = session()->get('cart', []);
        $id = (string) $program->id;
        $quantity = $validated['quantity'] ?? 1;

        if (isset($cart[$id])) {
            $newQuantity = $cart[$id]['quantity'] + $quantity;

            if ($newQuantity > $maxItemQuantity) {
                return redirect()->back()
                    ->with('error', 'Jumlah maksimal untuk satu program adalah '.$maxItemQuantity.'.');
            }

            $cart[$id]['quantity'] = $newQuantity;
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
        $maxItemQuantity = (int) config('cart.max_item_quantity');
        $validated = $request->validate([
            'action' => ['required_without:quantity', 'nullable', 'in:increase,decrease'],
            'quantity' => ['required_without:action', 'nullable', 'integer', 'min:1', 'max:'.$maxItemQuantity],
        ]);
        $cart = session()->get('cart', []);

        if (! isset($cart[$id])) {
            return redirect()->route('cart.index')->with('error', 'Item tidak ditemukan di keranjang.');
        }

        $action = $validated['action'] ?? null;

        if ($action === 'increase') {
            if ($cart[$id]['quantity'] >= $maxItemQuantity) {
                return redirect()->back()
                    ->with('error', 'Jumlah maksimal untuk satu program adalah '.$maxItemQuantity.'.');
            }

            $cart[$id]['quantity'] += 1;
        } elseif ($action === 'decrease') {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            } else {
                unset($cart[$id]);
            }
        } elseif (isset($validated['quantity'])) {
            $cart[$id]['quantity'] = $validated['quantity'];
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
