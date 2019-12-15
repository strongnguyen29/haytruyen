<ul class="navbar-nav mr-auto">

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarTheLoai" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Thể loại
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarTheLoai">
            <div class="row">
                    @foreach($cats as $cat)
                        <div class="col-12 col-md-4">
                            <a href="{{$cat->url}}" class="dropdown-item text-truncate" title="{{$cat->name}}">{{$cat->name}}</a>
                        </div>
                    @endforeach
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('filter.books')}}" title="Lọc truyện">Lọc truyện</a>
    </li>
</ul>
