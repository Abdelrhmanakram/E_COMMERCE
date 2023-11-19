<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function msg()
    {
        $basic = new \Vonage\Client\Credentials\Basic("ccf26d35", "a8wskBaTHdFxkTaj");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("201003905021", "ABDO", 'asdfghjn')
        );

        $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
    }
    public function all()
    {
        $products = Product::paginate(2);
        return view("user.home", compact("products"));
    }

    public function show($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view("user.show", compact("product", "category"));
    }


    public function cart($id)
    {
        $product = Product::findOrFail($id);
        return view("user.cart", compact("product"));
    }


    public function search(Request $request)
    {
        $key = $request->key;
        $products = Product::where("name", "like", "%$key%")->get();
        return view('user.home', compact('products'));
    }
}
