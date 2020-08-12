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
   
    <div class="container-fluid">
      
        <form action="{{ action('resp_recrutController@postDataForm') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label for="nom">nom:</label>
                    <input type="text" class="form-control" id="nom" placeholder="Enter password" name="nom">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="phone">phone:</label>
                    <input type="int" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
                  </div>
                  <div class="form-group">
                    <label for="role">poste:</label>
                    <select  class="form-control" id="role"  name="role">
                      @foreach ($postes as $poste)
                    <option value="{{$poste->name}}">{{$poste->name}}</option>
                      @endforeach
                      
                      
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="cv">cv:</label>
                    <input type="file" id="cv" name="file" ><br><br>
                  </div>
                  <button type="submit"  value="submit" class="btn btn-info">Submit</button>
                </form>
              
     </div>
  </div>
</div>


@endsection