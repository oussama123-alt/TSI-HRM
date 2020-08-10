@extends('layouts.app')

@section('content')

    <div id="sidebar">
      <header>
        <a href="#"> bonjour </a>
      </header>
      <ul class="nav">
        
        <li>
          <a href="/resp_recrut">
            <i class="zmdi zmdi-link"></i>voir candidats
          </a>
        </li>
        <li>
          <a href="/resp_recrut/create">
            <i class="zmdi zmdi-widgets"></i> créer candidats
          </a>
        </li>
        <li>
          <a href="/resp_recrut/createposte">
            <i class="zmdi zmdi-calendar"></i> creér poste
          </a>
        </li>
        <li>
          <a href="/resp_recrut/postes">
            <i class="zmdi zmdi-info-outline"></i> voir postes
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
    <div class="container">
      <div class="row">
        
            
            <div class="col-md-12">
            <h4 style="margin-left: 15px ;font-size: 40px;">liste des postes:</h4>
            <div class="table-responsive">
    
                    
        <table id="mytable" class="table table-bordred table-striped">
                       
       <thead>
           
            <th> Nom de poste</th>
            <th>discription</th>
            <th>nombre de postes</th>
            
           
        </thead>
       <tbody>
        @foreach($postes as $poste)
        <tr>
        <td>{{$poste->name}}</td>
        <td>{{$poste->discription}}</td>
        <td>{{$poste->nbr_postes}}</td>
        
        </tr>
        @endforeach
      </tbody>



@endsection