<?php

namespace TwoSeven\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use TwoSeven\Models\Channel;
use TwoSeven\Models\Subscription;

class SubscriptionController extends Controller
{

    public function __construct()
    {
        \Config::set('twigbridge.extensions.functions.is_active_channel', __CLASS__ . '::is_active_channel');
    }

    public static function is_active_channel($subscription, $channelId = 0)
    {
        if ((!$subscription instanceof Subscription) || $subscription->id == 0) return false;
        return array_key_exists($channelId, $subscription->contents->all());
    }

    public function subscribe($userId, Request $request)
    {
        if (!$userId || !User::find($userId)) return redirect('subscriptions')->with('error', 'User not found!');
        $channels              = $request->get('channels') ?? [];
        $subscriptionId        = $request->get('subscriptionId') ?? 0;
        $subscription          = Subscription::findOrNew($subscriptionId);
        $subscription->package = implode(':', $channels);
        $subscription->user_id = $userId;
        if ($subscriptionId && empty($channels)) {
            $subscription->destroy($subscriptionId);
            return redirect()->back()->with('warning', 'Item deleted successfully!');
        } else {
            $subscription->save();
            return redirect()->back()->with('success', 'Item created successfully!');
        }
    }

    public function index()
    {
        $users         = User::all();
        $subscriptions = Subscription::all();
        $channels      = Channel::all();
        return view("subscriptions::index", [
            "users"         => $users,
            "subscriptions" => $subscriptions,
            "channels"      => $channels
        ]);
    }

    public function userIndex($userId)
    {
        $user = User::find($userId);
        if (!$userId || !$user) return redirect('subscriptions')->with('error', 'User not found!');
        $subscriptions = Subscription::all()->where("user_id", $userId);
        $channels      = Channel::all();
        return view("subscriptions::user", [
            "user"          => $user,
            "subscriptions" => $subscriptions,
            "channels"      => $channels
        ]);
    }
}