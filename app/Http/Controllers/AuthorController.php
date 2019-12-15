<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AuthorInterface;

class AuthorController extends Controller
{
    /**
     * @var AuthorInterface
     */
    protected $authorRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexDesktop()
    {
        $datas = [];
        return view('mobile.author', $datas);
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexMobile()
    {
        $datas = [];

        return view('desktop.author', $datas);
    }

    /**
     * Get datas
     * @return array;
     */
    protected function getDatas() {
        $datas = [];

        return $datas;
    }

    /**
     * Get page head metas
     * @return array;
     */
    protected function getHeadMetas() {
        $metas = [];

        return $metas;
    }
}