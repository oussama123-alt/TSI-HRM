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
            <h4 style="margin-left: 15px ;font-size: 40px;">liste des candidats:</h4>
            <div class="table-responsive">
    
                    
        <table id="mytable" class="table table-bordred table-striped">
                       
       <thead>
           
            <th> Nom</th>
            <th>email</th>
            <th>phone</th>
            <th>poste</th>
            <th>cv</th>
            <th>Delete</th>
        </thead>
       <tbody>
        @foreach($candidats as $candidat)
        <tr>
        <td>{{$candidat->name}}</td>
        <td>{{$candidat->email}}</td>
        <td>{{$candidat->phone}}</td>
        <td>{{DB::table('postes')->where([                        
          ['id', $candidat->poste_id], ])->get()->pluck('name')[0]}}</td>
        <td><a href="{{url('/resp_recrut/'.$candidat->name.'/download')}} "><i class="fa fa-download" aria-hidden="true"></i></a></td>
       <td> <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash" ></i></a></td>

        <!-- Modal pour confirmer la suppression -->                                              
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
             
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>confirmer la suppression.. </p>
              </div>
              <div class="modal-footer">
                <a href="{{url('/resp_recrut/'.$candidat->name)}}"><i class="fa fa-trash">confirm</i></a>
              </div>
            </div>
            
          </div>
        </div>
        <td></td>
        </tr>
        @endforeach
      </tbody>



@endsection