<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'price', 'quantity', 'attributes'];

    /**
     * Add an item to the cart.
     *
     * @param array $data
     * @return void
     */
    public static function add($data)
    {
        $cart = session()->get('cart', []);

        $cart[] = $data;

        session()->put('cart', $cart);
    }

    /**
     * Remove an item from the cart.
     *
     * @param int $id
     * @return void
     */
    public static function remove($id)
{
    // Get the cart items from the session
    $cart = session()->get('cart', []);

    // Check if the cart is not empty
    if (!empty($cart)) {
        // Use array_values to reset the array keys after filtering
        $filteredCart = array_values(array_filter($cart, function ($item) use ($id) {
            // Filter out the item with the given ID
            return $item['id'] !== $id;
        }));

        // Update the cart in the session
        session()->put('cart', $filteredCart);
    }

    // Optionally, you can return the updated cart or a success message here
}


    /**
     * Get the contents of the cart.
     *
     * @return array
     */
    public static function getContent()
    {
        return session()->get('cart', []);
    }

    /**
     * Calculate the subtotal of the cart.
     *
     * @return float
     */
    public static function getSubTotal()
    {
        $cart = self::getContent();
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return $subtotal;
    }
}
