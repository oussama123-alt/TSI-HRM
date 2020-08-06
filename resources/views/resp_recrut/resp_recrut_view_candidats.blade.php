@extends('layouts.app')

@section('content')

    <div id="sidebar">
      <header>
        <a href="#"> bonjour </a>
      </header>
      <ul class="nav">
        <li>
          <a href="#">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
        <li>
          <a href="#">
            <i class="zmdi zmdi-link"></i>voir candidats
          </a>
        </li>
        <li>
          <a href="/resp_recrut/create">
            <i class="zmdi zmdi-widgets"></i> créer candidats
          </a>
        </li>
        <li>
          <a href="#">
            <i class="zmdi zmdi-calendar"></i> Events
          </a>
        </li>
        <li>
          <a href="#">
            <i class="zmdi zmdi-info-outline"></i> About
          </a>
        </li>
        <li>
          <a href="#">
            <i class="zmdi zmdi-settings"></i> Services
          </a>
        </li>
        <li>
          <a href="#">
            <i class="zmdi zmdi-comment-more"></i> Contact
          </a>
        </li>
      </ul>
    </div>



@endsection