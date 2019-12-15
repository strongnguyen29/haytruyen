<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ChapterInterface;

class ChapterController extends Controller
{
    /**
     * @var ChapterInterface
     */
    protected $chapterRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ChapterInterface $chapterRepository)
    {
        $this->chapterRepository = $chapterRepository;
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexDesktop()
    {
        $datas = [];
        return view('mobile.chapter', $datas);
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexMobile()
    {
        $datas = [];

        return view('desktop.chapter', $datas);
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