<div class="sidebar__item">
    <h4>Department</h4>
    <ul>
        @foreach(\App\Category::all() as $cat)
            <li><a href="{{$cat->getCategoryUrl()}}">{{$cat->__get("category_name")}}</a></li>
        @endforeach
    </ul>
</div>
