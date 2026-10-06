<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        $editor = User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'role' => 'editor',
        ]);

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'role' => 'user',
        ]);

        $categories = collect([
            'Elektronik',
            'Fashion',
            'Aksesoris',
            'Rumah Tangga',
            'Olahraga',
        ])->map(fn ($name) => Category::create([
            'name' => $name,
        ]));

        $tags = Tag::factory(5)->create();

        $products = Product::factory(50)
            ->state(fn () => [
                'category_id' => $categories->random()->id,
                'user_id' => $admin->id,
            ])
            ->create();

        $products->each(function ($product) use ($tags) {
            $product->tags()->attach($tags->random(2)->pluck('id'));
        });

        $order = Order::create([
            'user_id' => $admin->id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $items = [
            [
                'product_id' => $products->first()->id,
                'qty' => 2,
                'price' => $products->first()->price,
            ],
            [
                'product_id' => $products->skip(1)->first()->id,
                'qty' => 1,
                'price' => $products->skip(1)->first()->price,
            ],
        ];

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        $order->update([
            'total' => $order->items->sum('price'),
        ]);
    }
}