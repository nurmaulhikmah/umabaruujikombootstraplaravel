<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Mail\BalasPesanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        $unreadCount = Message::where('is_read', false)->count();

        return view('admin.kontak.index', compact('messages', 'unreadCount'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required|string',
        ]);

        $message = Message::findOrFail($id);

        Mail::to($message->email)->send(new BalasPesanMail(
            $message->nama,
            $message->pesan,
            $request->balasan
        ));

        $message->update(['is_read' => true]);

        return redirect()->route('admin.kontak.index')->with('success', 'Balasan berhasil dikirim!');
    }

    public function toggleRead($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_read' => !$message->is_read]);

        return back()->with('success', 'Status pesan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan berhasil dihapus.');
    }
}