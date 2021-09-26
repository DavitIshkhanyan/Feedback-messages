<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:messages'],
            'message_title' => ['required', 'string', 'max:255'],
            'message_body' => ['required', 'string'],
        ]);
        Message::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'message_title' => $request->input('message_title'),
            'message_body' => $request->input('message_body'),
            'sent_date' => date("Y-m-d H:i:s"),
        ]);
        return redirect()->route('feedback')->with('info','Thank you for submitting the message');
    }

    public function index(){
        $messages = Message::all();
        return view('messages',['messages'=>$messages]);
    }

   
    public function view($id){
        $message= Message::findOrFail($id);
       return view('single_message')->with('message',$message);
    }

    public function delete($id)
    {
        Message::destroy($id);
        return redirect()->route('messages');
    }

}
