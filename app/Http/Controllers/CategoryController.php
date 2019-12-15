<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryInterface;

class CategoryController extends Controller
{
    /**
     * @var CategoryInterface
     */
    protected $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexDesktop()
    {
        $datas = [];
        return view('mobile.category', $datas);
    }

    /**
     * Show the view on desktop.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexMobile()
    {
        $datas = [];

        return view('desktop.category', $datas);
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