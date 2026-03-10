@include('layouts.header')

<!-- Overlay for mobile sidebar -->
<div class="overlay" id="overlay"></div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="logo">TaskTrack</div>

  <ul class="menu">
    @foreach($menus as $menu)
    <li>
      <a href="{{ $menu->url }}">
        <span>{{ $menu->name }}</span>
        @if($menu->children->count() > 0)
        <i class="fa-solid fa-chevron-down arrow"></i>
        @endif
      </a>

      @if($menu->children->count() > 0)
      <ul class="submenu">
        @foreach($menu->children as $child)
        <li><a href="{{ $child->url }}">{{ $child->name }}</a></li>
        @endforeach
      </ul>
      @endif
    </li>
    @endforeach
  </ul>
</div>

<div class="main" id="main">
  @yield('content')
</div>

@include('layouts.footer')