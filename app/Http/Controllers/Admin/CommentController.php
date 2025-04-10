<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function listComment()
    {
        $listCmt = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->join('products', 'products.id', '=', 'comments.product_id')
            ->select('comments.content', 'users.name as user_name', 'products.name as product_name')
            ->paginate(5);

        return view('admin.comment.ListComment', compact('listCmt'));
    }
    public function deleteComment(Request $req)
    {
        Comment::where('id', $req->idCmt)->delete();
        return redirect()->route('admin.comment.listComment')->with([
            'message' => 'Xóa thành công'
        ]);
    }
}
