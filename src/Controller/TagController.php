<?php
namespace Hillel\Controller;

use Hillel\Model\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TagController
{
    public function index(){
        $tags = Tag::all();

        return view('pages/tag/list',compact('tags'));

    }

    public function create(){
        $tag = new Tag();
        return view('pages/tag/edit',compact('tag'));
    }

    public function store(){
        $data = request()->all();
        $validator = validator()->make($data, [
            'title'=> ['required','min:5','unique:tags,title'],
            'slug'=> ['required','min:5','unique:tags,slug']
        ]);
        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['errors'] = $error->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag = new Tag();
        $tag->title=$data['title'];
        $tag->slug=$data['slug'];
        $tag->save();
        $_SESSION['message'] = [
            'status' => 'success',
            'message' => "Tag \"{$data['title']}\" successfully saved",

        ];
        return new RedirectResponse('/tag/list');
    }


    public function destroy($id){

        $tag =  Tag::find($id);
        $tag->delete();

        return new RedirectResponse('/tag/list');

    }
    public function delete_many(){
    $tags = Tag::all();
    return view('pages/tag/delete',compact('tags'));

    }


    public function destroy_many(){
        $data = request()->all();
       Tag::destroy($data[tags_id]);
        return new RedirectResponse('/tag/list');
    }

    public function edit($id){
        $tag =  Tag::find($id);
        return view('pages/tag/edit',compact('tag'));

    }

    public function edit_select(){
        $tags =  Tag::all();
        return view('pages/tag/select-tag',compact('tags'));

    }

    public function update($id){
        $data = request()->all();
        $validator = validator()->make($data, [
            'title'=> ['required','min:5','unique:tags,title,'. $id],
            'slug'=> ['required','min:5','unique:tags,slug,'. $id]
        ]);
        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['errors'] = $error->toArray();
            $_SESSION['data'] = $data;

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag =  Tag::find($id);
        $tag->title=$data['title'];
        $tag->slug=$data['slug'];
        $tag->save();
        $_SESSION['message'] = [
            'status' => 'success',
            'message' => "Tag \"{$data['title']}\" successfully saved",

        ];
        return new RedirectResponse('/tag/list');
    }

    public function edit1()
    {
      $data = request()->all();
      $tag = Tag::find($data['id']);
      $_SESSION['mark'] = $data['mark'];
      return view('pages/tag/edit', compact('tag'));
    }



}