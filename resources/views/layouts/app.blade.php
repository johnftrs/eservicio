<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{!!URL::to('icons/icono.png')!!}" />
  <link rel="icon" type="image/png" href="{!!URL::to('icons/icono.png')!!}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Lotus</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @livewireStyles
  {!!Html::style('css/materialdesignicons.min.css')!!}
  {!!Html::style('css/jquery-ui.min.css')!!}
  {!!Html::style('css/datatables.css')!!}
  {!!Html::style('css/MentisMe.css')!!}
  {!!Html::style('css/admin.css')!!}
  @yield('admincss')
</head>
<?php if(!isset($me)){$me='';} if(!isset($po)){$po='';} ?>
<body>
  <aside>
    <div class="logo">
      <a href="{{url::to('home')}}">
        <img src="{!!URL::to('icons/icono.png')!!}" alt="">{!!'&nbsp;'.strtoupper(\Auth::user()->people->office->nombre)!!}
      </a>
    </div>
    <div class="sidebar">
      <ul>
        @foreach (Auth::user()->role->menus() as $menu)
        <li class="nav_menu @if($me == $menu->code){{'active'}}@endif" href="#">
          <a @if($menu->tamanyo==0) href="{{url(Auth::user()->role->functionalitiesByMenuCode($menu->code)->where('mostrar',1)->first()->path)}}" @else href="#" onclick="return false;" @endif>
            <i class="mdi mdi-{{$menu->icon}}"></i><p>{{$menu->label}}</p>
          </a>
          @if($menu->tamanyo>0)
          <ul tamano="{{$menu->tamanyo}}">
            @foreach (Auth::user()->role->functionalitiesByMenuCode($menu->code)->where('mostrar',1) as $functionality)
            <li class="{{$functionality->code}}">
              <a class="@if($po == $functionality->code){{'estoy'}}@endif" href="{{url($functionality->path)}}"><i class="mdi mdi-menu-right"></i><p>{{$functionality->label}}</p></a>
            </li>
            @endforeach
          </ul>
          @endif
        </li>
        @endforeach
      </ul>
    </div>
  </aside>
  <section>
    <nav>
      <div class="nav-menu-btn">
        <a onclick="mostrar_aside();">
          <i class="mdi mdi-menu"></i>
        </a>
      </div>
      {{--
      <div class="nav-search">
        <input type="text" value="" id="input_buscador" onclick="buscar(this);" class="form-control buscador" placeholder="Buscar..">
        <button type="button" onclick="buscar(this);">
          <i class="mdi mdi-magnify"></i>
        </button>
        <ul id="ul_est">
          @foreach ($tickets as $ticket)
          @if($ticket->lot->office_id == Auth::user()->people->office_id)
          <li class="{{$ticket->estado}}">
            <a href="{!!url('admin/activar/ticket/'.$ticket->id)!!}" class="{{$ticket->codigo}}">Vale: {{$ticket->codigo}} {{$ticket->serie}}<span>{{$ticket->estado}}</span></a>
          </li>
          @endif
          @endforeach
        </ul>
      </div>
      --}}
      <div class="nav-log">
        <a onclick="desplegar_log(this);">
          <i class="mdi mdi-account"></i>
        </a>
        <ul>
          <li><a href="{!!URL::to('user/'.Auth::id().'/edit')!!}"><i class="mdi mdi-pencil"></i>Edit profile</a></li>
          <li><a href="{!!URL::to('pass/changePasswordForm')!!}"><i class="mdi mdi-key"></i>Change password</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout"></i>Log out</a>
          </li>
        </ul>
      </div>
      <div class="nav-user"><p>{{Auth::user()->name}}</p><p>{{Auth::user()->role->name}}</p></div>
    </nav>
    <div class="content">
      {{ $slot }}
    </div>
  </section>
  {!!Html::script('js/jquery.js')!!}
  {!!Html::script('js/jquery-ui.min.js')!!}
  {!!Html::script('js/datatables.min.js')!!}
  {!!Html::script('js/boot.js')!!}
  {!!Html::script('js/admin.js')!!}
  @livewireScripts
  @yield('adminjs')
</body>
</html>
