<?php

namespace App\Controllers;

class Post extends BaseController
{
    public function index($post)
    {
        $redirect = route_to('posts.show', $post);
        return redirect()->to($redirect);
    }

    public function index2($show)
    {
        $redirect = route_to('show.info', $show);
        return redirect()->to($redirect);
    }
    
}
