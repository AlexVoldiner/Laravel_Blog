<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function create(Request $request)
    {


        if($request->isMethod('post')) {

            $this->validate($request,[
                'title' => 'required',
                'preview' => 'required',
                'text' => 'required',
            ]);

            if ($request->hasFile('image')) {

                $img = Image::make($request->file('image'));
                $filename = str_random(20) . '.' . 'jpg';
                if ($img->height() > $img->width()) {
                    $img->resize(null, 100, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize() ;
                    });
                } else {
                    $img->resize(100, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }
                $img->save(public_path() . '/storage/' . $filename);

            } else {
                $filename = 'null';
            }

            Blog::create(
                [
                    'public_date' => \Carbon\Carbon::now(),
                    'title' => $request->input('title'),
                    'preview' => $request->input('preview'),
                    'text' => $request->input('text'),
                    'image' => $filename,

                ]

            );
            $good = "Запись добавлена";
        }

        return view('admin', ['good'=>$good]);
    }
}
