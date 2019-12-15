<header id="header" class="fixed-top shadow">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark pl-0 pr-0">
            <a class="navbar-brand" href="{{url('/')}}" title="{{config('app.name')}}">
                <h1 class="text-uppercase mb-0">{{config('app.name')}}</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                @include('layouts.desktop.main_menu')

                <form class="form-inline my-2 my-lg-0" id="search-form" autocomplete="off">
                    <div class="position-relative">
                        <input id="input-search" class="form-control mr-0 rounded-pill" type="search" placeholder="Nhập tên truyện, tác giả..." aria-label="Search" name="s">
                        <i class="material-icons text-color-primary icon-search">search</i>
                    </div>
                    <div class="search-result list-group shadow" tabindex="-1">

                    </div>
                </form>
            </div>
        </nav>
    </div>
</header>
