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
        <a href="/resp_recrut">
          <i class="zmdi zmdi-view-dashboard"></i> voir candidats
        </a>
      </li>
      <li>
        <a href="/resp_recrut/create">
          <i class="zmdi zmdi-link"></i> créer candidat
        </a>
      </li>
      <li>
        <a href="/resp_recrut/createposte">
          <i class="zmdi zmdi-widgets"></i> créer poste
        </a>
      </li>
      <li>
        <a href="/resp_recrut/postes">
          <i class="zmdi zmdi-calendar"></i> voir postes
        </a>
      </li>
      
    </ul>
  </div>
  <!-- Content -->
  <div id="content">
    <table class="table table-hover">
        <thead>
          
        </thead>
        <tbody>
          <tr>
            <th scope="row">nom de poste</th>
          <td>{{$poste->name}}</td>
          </tr>
          <tr>
            <th scope="row">discription</th>
          <td>{{$poste->discription}}</td>
          </tr>
          <tr>
            <th scope="row">nombre de postes</th>
          <td colspan="2">{{$poste->nbr_postes}}</td>
          </tr>
          <tr>
            <th scope="row">candidats pour cette poste</th>
           
          <td colspan="2"> @foreach($candidats as $candidat)<a href="{{url('/resp_recrut/'.'candidats/'.$candidat->id)}}">{{$candidat->name.'| '}}</a> @endforeach</td>
         
          </tr>
        </tbody>
      </table>
    

  </div>
</div>


@endsection