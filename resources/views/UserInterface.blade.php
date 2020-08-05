@extends('layouts.app')

@section('content')


<div id="viewport">
    <!-- Sidebar -->
    <div id="sidebar">
      <header>
        <a href="#"> bonjour {{Auth::user()->name}}</a>
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
        
        <span style="float:left ;padding-right:700px;"><h1>votre tableaux de ponting:</h1></span>
        <!-- button pause disabled si le temp de pause a été marquer -->
        @if(empty($finish_at1[0])   )
          <span style="float:left ;margin-right:25px"><a href="{{ url('/pause/')}}" class="btn   btn-xs btn-info pull-left ">pause</a></span>
          
        @else
          <span style="float:left ;margin-right:25px"><a href="{{ url('/pause/')}}" class="btn disabled  btn-xs btn-info pull-left ">pause</a></span>
        
         @endif 
          
          <!-- button de reprise enable si le temp de pause a été marquer-->
      @if( !empty($started_at2[0]) || empty($finish_at1[0]  ))
       <span> <a href="{{ url('/reprise/')}}" class="btn disabled btn-xs btn-danger pull-right">reprise</a></span>
          
        @else
        <span>  <a href="{{ url('/reprise/')}}" class="btn  btn-xs btn-danger pull-right">reprise</a></span>
        
         @endif 
          
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">jour</th>
                <th scope="col">debut de travaille</th>
                <th scope="col">debut pause</th>
                <th scope="col">fin pause</th>
                <th scope="col">fin de travaille</th>
                <th scope="col">heures de travaille</th>

              </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
              <tr>
                <th scope="row">{{$log->day}}</th>
                <td>{{$log->started_at1}}</td>
                <td>{{$log->finnish_at1}}</td>
                <td>{{$log->started_at2}}</td>
                <td>{{$log->finish_at2}}</td>
                <td>{{$log->totale}}</td>
              </tr>
              @endforeach
        
            </tbody>
          </table>
          
          
      </div>
    </div>
  </div>

@endsection