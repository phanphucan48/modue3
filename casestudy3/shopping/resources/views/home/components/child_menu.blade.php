@if($categorysParent->categoryChildrent->count())
<ul role="menu" class="sub-menu">
    @foreach($categorysParent->categoryChildrent as $categoryChild)
    <li>

        <a href="shop.html">{{ $categoryChild->name }}</a>
@if($categoryChild->categoryChildrent->count())
    @include('home.components.child_menu',['categorysParent'=>$categoryChild])
        @endif
    </li>
    @endforeach
</ul>
@endif
