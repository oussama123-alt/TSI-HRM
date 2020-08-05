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
            <i class="zmdi zmdi-link"></i> recrutment
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
        
        <span style="float:left ;padding-right:700px;"><h1>liste de employees:</h1></span>
        <div class="search-container">
          <form method="POST" action="{{ url('/AdminInterface/filter')}}">
            {{ csrf_field() }}
            <input type="text" placeholder="Search by name" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">nom</th>
                <th scope="col">email</th>
                <th scope="col">id</th>
              
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
              <tr>
                <th scope="row">{{$user->name}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->id}}</td>
                <td><a href="{{url('/AdminInterface/'.$user->name)}}" class="btn btn-xs btn-info pull-left" >pointing</a></td>
               
                
              </tr>
              @endforeach
        
            </tbody>
          </table>
          
          
      </div>
    </div>
  </div>

@endsection