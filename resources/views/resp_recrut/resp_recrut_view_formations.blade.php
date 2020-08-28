@extends('layouts.app')

@section('content')

    <div id="content">
     
      <div class="container-fluid">
        
        <span style="float:left ;padding-right:700px;"><h1>liste de formations:</h1></span>
            <div class="search-container">
              <form method="POST" action="{{ url('/resp_recrut/filterCandidats')}}">
                {{ csrf_field() }}
                <input type="text" placeholder="recherche par nom" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <div class="table-responsive">
    
                    
        <table id="mytable" class="table table-bordred table-striped">
                       
       <thead>
            <th> Nom</th>
            <th>contenu</th>
            <th>nombre de participants</th>
            <th>date de debut</th>
            <th>date de fin</th>
            <th>Delete</th>
       </thead>
       <tbody>
        @foreach($formations as $formation)
        <tr >
        <td>{{$formation->name}}</td>
        <td>{{substr($formation->contenu, 0, 50).'...'}}</td>
        <td>{{$formation->participants->count()}}</td>
        <td>{{$formation->debut}}</td>
        <td>{{$formation->fin}}</td>
        <td><a href="" data-toggle="modal" data-target="#{{$formation->name}}"><i class="fa fa-trash" ></i></a></td>  
        <td><a href="{{url('/resp_recrut/'.'formations/'.$formation->id)}}" class="btn btn-xs btn-info pull-left" >details</a></td>
        <!-- Modal pour confirmer la suppression -->                                              
        <div class="modal fade" id="{{$formation->name}}" role="dialog">
          <div class="modal-dialog">        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>confirmer la suppression de formation '{{$formation->name}}' </p>
              </div>
              <div class="modal-footer">
                <a href="{{url('/resp_recrut/'.'formations/delete/'.$formation->id)}}"><i class="fa fa-trash">confirm</i></a>
              </div>
            </div>  
          </div>
        </div>
       </tr>
       @endforeach
      </tbody>
    </div>
  </div>
</div>



@endsection