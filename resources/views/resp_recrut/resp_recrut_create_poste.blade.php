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
      
        <form action="{{ action('resp_recrutController@createposte') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label for="nom">nom de poste</label>
                    <input type="text" class="form-control" id="nom" placeholder="nom de poste" name="nom">
                  </div>
                  <div class="form-group">
                    <label for="discription">discription</label>
                    <textarea type="text" class="form-control" id="discription" placeholder="discription de poste" name="discription"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="nbr_postes">nombre de postes</label>
                    <input type="int" class="form-control" id="nbr_postes" placeholder="nombre de postes" name="nbr_postes">
                  </div>
                 
                  <button type="submit"  value="submit" class="btn btn-info">créer</button>
                </form>
              
     </div>
  </div>
</div>


@endsection