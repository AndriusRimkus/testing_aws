<?php

namespace App\Http\Controllers;

use BenSampo\Embed\Rules\EmbeddableUrl;
use BenSampo\Embed\Services\YouTube;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = DB::table('videos')->get();

        return view('layouts.app', ['videos' => $videos]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $this->validate(request(), [
            'url' => [
                'required',
                (new EmbeddableUrl)->allowedServices([
                    YouTube::class
                ])
            ],
        ]);

        DB::table('videos')->insert([
            'url' => request()->get('url')
        ]);

        return back();
    }
}
