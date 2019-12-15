<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BookInterface;

class BookController extends Controller
{
    /**
     * @var BookInterface
     */
    protected $bookRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexDesktop()
    {
        $datas = [];
        return view('mobile.book', $datas);
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexMobile()
    {
        $datas = [];
        return view('desktop.book', $datas);
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