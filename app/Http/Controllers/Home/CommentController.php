<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use App\Models\DetailOrder;
use App\Models\Good;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $comment)
    {
        $id = \request () -> query ('id');
        \Cache ::flush ();
        if (!\Cache::get ('comments_'.$id)){
            $comments = $comment -> with ('user') -> where ('good_id', $id) -> get ();
            \Cache::put ('comments_'.$id,$comments,60*24*7);
            return ['code'=>1,'msg'=>'success','comments'=>$comments];
        }else{
            $comments=\Cache::get ('comments_'.$id);
            return ['code'=>1,'msg'=>'success','comments'=>$comments];
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('home.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment)
    {
//        dd ($request -> all ());
        $spes=DetailOrder::where('order_id',$request->id)->first();
        $goods=Good::where('id',$spes->good_id)->first();
        $comment->name=$goods->name;
        $comment -> user_id = auth () -> id ();
        $comment->good_id=$spes->good_id;
        $comment->spes=[$spes->color,$spes->spec];
        $comment->pics=$request['pics'];
        $comment->satisfaction=$request['satisfaction'];
        $comment->goods_satisfaction=$request['goods_satisfaction'];
        $comment->shop_satisfaction=$request['shop_satisfaction'];
        $comment->shiping_satisfaction=$request['satisfaction'];
        $comment->server_satisfaction=$request['server_satisfaction'];
        $comment->content=$request['content'];
        $comment -> save ();








        //使用缓存保存评论
//        dd (auth ()->user());
//        if (auth ()->check()){
//            $comment->user_id=auth ()->id ();
//            $comment->good_id=$request->id;
//            $comment->content=$request['content'];
//            $comment->save ();
////            $commentdata=json_encode ($comment,true);
////            \Cache::put ('comment_'.$comment->id,$commentdata,60*24*7);
//            $comment=$comment->with('user')->find($comment->id);
//            return ['code'=>1,'msg'=>'发表成功','comment'=>$comment];
//        }else{
//            return ['code'=>0,'msg'=>'未登录'];
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
