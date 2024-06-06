<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
      
       $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->body();
   // echo "<pre>";
        $posts = json_decode($posts);
        $list = [];
        $i = 0;
        foreach($posts as $post){
           
            $list[$i] = $post;
            $comment = Http::get('https://jsonplaceholder.typicode.com/comments?postId='.$post->id)->body();
           
            $list[$i]->count = count(json_decode($comment));

            $i++;
        }

      // print_r($list);  die;
        return view('list',compact('list'));
    }

    public function comments($id){
        return 4;
    }


    public function detail(string $id)
    {
       // echo $id; die;

       $post = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id)->body();
    //echo "<pre>";
        $post = json_decode($post);

        $comment = Http::get('https://jsonplaceholder.typicode.com/comments?postId='.$id)->body();

        $comments = json_decode($comment);

        
      // print_r($comment); 
        return view('detail',compact('comments','post'));
    }

    public function send(Request $request) {

        

        $message = $request->input('msg');

      //  echo  $message ; die;
        $response = Http::post("https://api.telegram.org/bot7299433133:AAHbXUOGV2Jh1VFavdWGN7g5qzzvJC-3o64/sendMessage?" . http_build_query([
            'chat_id' => config('telegramBot.key'),
                        'text' => $message,
                        'disable_web_page_preview' => true,
                        'disable_notification' => true,
                        'parse_mode' => 'HTML'
        ]));

        $res = $response->body();
       // print_r(jaso$res);
         $v = json_decode($res);
         return $v;

    }
}
