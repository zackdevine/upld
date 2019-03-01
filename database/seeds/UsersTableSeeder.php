<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::create([
    		'username' => Str::random(4),
    		'email' => Str::random(4) . '@upld.app',
    		'password' => bcrypt('testpass')
    	]);
    	if (config('services.stripe.enabled')) {
            $user->createAsStripeCustomer();
            $user->newSubscription('upld', 'Free')->create();
        }
    }
}
