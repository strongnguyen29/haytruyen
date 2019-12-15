<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\BookInterface;

class HomeController extends Controller
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
        return view('desktop.home', $this->getDatas());
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexMobile()
    {
        return view('mobile.home', $this->getDatas());
    }

    /**
     * Get datas
     * @return array;
     */
    protected function getDatas() {
        $datas = [];

        $datas['metas'] = $this->getHeadMetas();
        return $datas;
    }

    /**
     * Get page head metas
     * @return array;
     */
    protected function getHeadMetas() {
        $metas = [];

        $metas['title'] = settings('head_title');

        return $metas;
    }
}
