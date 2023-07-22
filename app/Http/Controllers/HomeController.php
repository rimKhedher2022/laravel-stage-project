<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('pages.dashboard', ['notifications'=> $notifications]);
    }

    public function markNotification(Request $request)

        {
            auth()->user()
            ->unreadNotifications
            ->when($request->input('id'),function($query) use ($request){
                return $query->where('id' , $request->input('id')) ; 
            }) ->markAsRead() ; 
            return response()->noContent() ; 
            
        }

   
}
