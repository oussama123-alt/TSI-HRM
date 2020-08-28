@extends('layouts.app')

@section('content')

    <div id="content">
     
      <div class="container-fluid">
        
        <span style="float:left ;padding-right:700px;"><h1>liste de candidats:</h1></span>
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
            <th>email</th>
            <th>phone</th>
            <th>poste</th>
            <th>status</th>
            <th>cv</th>
            <th>Delete</th>
            <th>accepter/refuser</th>
            <th>details</th>
       </thead>
       <tbody>
        @foreach($candidats as $candidat)
        <tr  >
        <td>{{$candidat->name}}</td>
        <td>{{$candidat->email}}</td>
        <td>{{$candidat->phone}}</td>
        <td><a href="{{url('/resp_recrut/'.'postes/'.$candidat->poste_id)}}">{{DB::table('postes')->where([                        
          ['id', $candidat->poste_id], ])->get()->pluck('name')[0]}}</a></td>
          <td @if ($candidat->status =='refusé')              {{-- changer le couleur vers/rouge  --}} 
        
            style="background-color:rgb(212 49 71)" 
          @elseif($candidat->status =='accepté')  
           style="background-color:rgb(109 212 106)"
          
         @endif>{{$candidat->status}}</td>
        <td><a href="{{url('/resp_recrut/'.$candidat->id.'/download')}} "><i class="fa fa-download" aria-hidden="true"></i></a></td>
        <td> <a href="" data-toggle="modal" data-target="#{{$candidat->name}}"><i class="fa fa-trash" ></i></a></td>
        <td><a href="{{url('/accept/'.$candidat->id)}}"  @if ($candidat->status =='refusé')    {{-- changer l'icon  --}}     
                                                                class="fa fa-check"
                                                                >accepter</a></td>
                                                           @elseif($candidat->status =='accepté')
                                                               class="fa fa-ban"
                                                               >refuser</a></td> 
                                                            @else class="fa fa-check"
                                                            >accepter</a></td> 
                                                           @endif    
                                                                                    
        <td><a href="{{url('/resp_recrut/'.'candidats/'.$candidat->id)}}" class="btn btn-xs btn-info pull-left" >details</a></td>
        <!-- Modal pour confirmer la suppression -->                                              
        <div class="modal fade" id="{{$candidat->name}}" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
             
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p>confirmer la suppression  de candidat {{$candidat->name}} </p>
              </div>
              <div class="modal-footer">
                <a href="{{url('/resp_recrut/'.$candidat->id)}}"><i class="fa fa-trash">confirm</i></a>
              </div>
            </div>
            
          </div>
        </div>
        <td></td>
        </tr>
        @endforeach
      </tbody>
    </div>
  </div>
</div>



@endsection