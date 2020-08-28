@extends('layouts.app')

@section('content')



  <!-- Content -->
  <div id="content">
   
    <div class="container-fluid">
      
        <form action="{{ action('resp_recrutController@createFormation') }}" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="form-group">
                    <label for="nom">nom de formation:</label>
                    
                    <input type="text" class="form-control" id="name" placeholder="Entrer nom" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="contenu">contenu de formation:</label>
                    <textarea class="form-control" id="contenu" placeholder="Entrer contenu..." name="contenu"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="formateur">choisit un formateur:</label>
                    <select  class="form-control" id="formateur"  name="formateur">
                      @foreach ($users as $user)
                    <option value="{{$user->name}}">{{$user->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="langues">participants:</label>
                    <div id="dynamicInput">
                     <span id="getspan">
                      <select name="participants" class="participants">
                          @foreach ($users as $user)
                          <option  value="{{$user->name}}">{{$user->name}}</option>
                          @endforeach
                      </select>   
                    <button style="float: none;" type="button" onclick="myFunction5(this)" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                    </button>
                    <span style="display: inline-block;border-left: 1px solid #ccc;margin: 0 10px;height:20px;" ></span>
                     </span>
                      
                        <input name="particip[]" id="particip" type="hidden"> 
                 </div>
                 <button type="button" class="btn btn-success" onclick="myFunction6('dynamicInput')">ajouter un participant</button> 
                </div>
                                   
                  <div class="form-group">
                    <label for="role">date de debut:</label>
                    <input type="datetime-local"  name="debut">
                  </div>
                  <div class="form-group">
                    <label for="role">date de fin:</label>
                    <input type="datetime-local"  name="fin">
                 </div>
                  
                 
                  <button  type="submit" onclick="myFunction7()" value="submit" class="btn btn-info">Submit</button>
                </form>
                
     </div>
  </div>

 


@endsection