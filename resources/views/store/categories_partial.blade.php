@section('categories')

<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categories</h2>
        <div class="panel-group category-products" id="accordian"><!--category-products-->
            @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{route('category.list', ['category' => $category->name]) }}">{{$category->name}}</a>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    </div>
</div>

@endsection