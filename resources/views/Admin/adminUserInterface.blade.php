@extends('layouts.app')

@section('content')


<div id="viewport">
    <!-- Sidebar -->
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
            <i class="zmdi zmdi-link"></i> Shortcuts
          </a>
        </li>
        <li>
          <a href="#">
            <i class="zmdi zmdi-widgets"></i> Overview
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
    <!-- Content -->
    <div id="content">
     
      <div class="container-fluid">
        
        <span style="float:left ;padding-right:400px;"><h1> tableaux de pointing de {{$user->name}}:</h1></span>
        <div class="search-container">
          <form method="POST" action="{{url('/AdminInterface/'.$user->name.'/filterdate')}}">
            {{ csrf_field() }}
            <input type="date" placeholder="Search by date" name="date">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
       
          
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">jour</th>
                <th scope="col">debut de travaille</th>
                <th scope="col">debut pause</th>
                <th scope="col">fin pause</th>
                <th scope="col">fin de travaille</th>
                <th scope="col">heures de travaille</th>
                <th scope="col">modifier</th>

              </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
              <tr >
                <th scope="row">{{$log->day}}</th>
                <td @if ($log->started_at1>= '08:05:00')style="background-color: rgb(238, 98, 98)"@endif >{{$log->started_at1}}</td>
                <td>{{$log->finnish_at1}}</td>
                <td @if ($log->started_at2>= '12:35:00')style="background-color: rgb(238, 98, 98)"@endif >{{$log->started_at2}}</td>
                <td>{{$log->finish_at2}}</td>
                <td>{{$log->totale}}</td>
                <td><a href="{{url('/AdminInterface/'.$user->name.'/'.$log->id)}}" class="btn btn-xs btn-info pull-left" >modifier</a></td>
              </tr>
              @endforeach
        
            </tbody>
          </table>
          
          
      </div>
    </div>
  </div>

@endsection