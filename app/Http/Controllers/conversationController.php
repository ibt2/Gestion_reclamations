<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Repository\ConversationRepository; // Corrected repository namespace
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

class ConversationController extends Controller // Corrected class name to follow PSR-4 standard
{
    private $r;
    private $auth;

    public function __construct(ConversationRepository $conversationRepository , AuthManager $auth)
    {
        $this->r = $conversationRepository;
        $this->auth=$auth;
    }

    public function index()
    {
        $users = User::select('name', 'id')->where('id', '!=', Auth::user()->id)->get();

        return view('conversations.index', ['users' => $this->r->getConversations($this->auth->user()->id)]);
    }

    public function show(User $user)// Corrected parameter type and casing
    {

        return view('conversations.show', ['users' => $this->r->getConversations($this->auth->user()->id), 'user'=>$user,
        'messages'=>$this->r->getMessagesFor($this->auth->user()->id,$user->id)->get() ]);
    }
    public function store(User $user, Request $request){
        $this->r->createMessage(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        return redirect(route('conversations.show', ['user' => $user]));
    }

}
