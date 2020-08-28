@extends('layouts.app')

@section('content')

    <div id="content">
     
      <div class="container-fluid">
        
        <span style="float:left ;padding-right:700px;"><h1>liste de postes:</h1></span>
            <div class="search-container">
              <form method="POST" action="{{ url('/resp_recrut/postes/filterPostes')}}">
                {{ csrf_field() }}
                <input type="text" placeholder="recherche par nom" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <div class="table-responsive">
    
                    
        <table id="mytable"  class="table table-bordred table-striped">
                       
       <thead>
           
            <th> Nom de poste</th>
            <th> date de creation</th>
            <th>nombre de postes</th>
            <th>nombre de candidats</th>
            <th>discription</th>
            <th>details</th>
            
            
           
        </thead>
       <tbody>
        @foreach($postes as $poste)
        <tr>
        <td>{{$poste->name}}</td>
       
        <td>{{$poste->created_at}}</td>
        <td>{{$poste->nbr_postes}}</td>
        <td>{{$poste->candidat->count()}}</td>
        <td>{{substr($poste->discription, 0, 50).'...'}}</td>
        <td><a href="{{url('/resp_recrut/'.'postes/'.$poste->id)}}" class="btn btn-xs btn-info pull-left" >details</a></td>
        
        </tr>
        @endforeach
       </tbody>
      </div>
    </div>
  </div>
</div>


@endsection