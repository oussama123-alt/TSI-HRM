@extends('layouts.app')

@section('content')

  <!-- Content -->
  <div id="content">
    <form action="{{ action('resp_recrutController@modifierFormation') }}" method="POST" enctype="multipart/form-data">
      {!! csrf_field() !!}
    <table class="table table-hover">
        <thead>        
        </thead>
        <tbody>        
          <tr>
          <th scope="row">nom de formation</th>
          <td class="default" style="visibility: visible">{{$formation->name}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$formation->name}}" name="nom" type="text">
            <input name="id" value="{{$formation->id}}" type="hidden"></td>
         </tr>         
          <tr>
            <th scope="row">contenu</th>
          <td class="default" style="visibility: visible">{{$formation->contenu}}</td>
          <td class="modifier" style="visibility: hidden"> <textarea placeholder="{{$formation->contenu}}" name="contenu" type="textarea"></textarea></td>
          </tr>
          <tr>
            <th scope="row">formateur</th>
          <td class="default" style="visibility: visible">{{$formation->formateur->name}}</td>
          <td class="modifier" style="visibility: hidden"> 
           <select  class="form-control" id="formateur"  name="formateur">
           {{$users =DB::table('users')->get()}}
            @foreach ($users as $user)
           <option value="{{$user->name}}">{{$user->name}}</option>
            @endforeach
          </select></td>
          </tr>
          <tr>
            <th scope="row">debut de formation</th>
          <td class="default" style="visibility: visible">{{$formation->debut}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$formation->debut}}"name="debut" type="datetime-local"></td>
          </tr>
          <tr>
            <th scope="row">fin de formation</th>
            <td class="default" style="visibility: visible" >{{$formation->fin}}</td>
            <td class="modifier" style="visibility: hidden"><input placeholder="{{$formation->fin}}"name="fin" type="datetime-local"></td>
           </tr>
          <tr>
            <th scope="row">liste de participants</th>
          <td class="default" style="visibility: visible">
          
            @foreach ($formation->participants as $participant)
              {{$participant->name}} <br>
            @endforeach
          </td>
          <td class="modifier" style="visibility: hidden"> 
            <div id="dynamicInput">
             
           @foreach ( $formation->participants as $participant)
              <div>
              <br><select name="participants" class="participants">
                <option value="{{$participant->name}}">{{$participant->name}}</option>
                @foreach ($users as $user)
                <option  @if ($user->name==$participant->name) 
                  style="display:none" 
                  @endif value="{{$user->name}}">{{$user->name}}</option>
                 @endforeach
              </select> 
              <button style="float: none;" type="button" onclick="myFunction5(this)" class="close" aria-label="Close">
               <span aria-hidden="true">&times;</span>
              </button>
              </div>
           @endforeach           
           <input name="particip[]" id="particip" type="hidden">
            </div>
            <button type="button" class="btn btn-success" onclick="myFunction6('dynamicInput')">ajouter un participant</button>  
          </td>
          </tr>                   
          <tr>
            <th  style="visibility: visible"  scope="row">date de creation</th>           
            <td  style="visibility: visible">{{$formation->created_at}}</td>
         </tr>         
        </tbody>
      </table>
      <button type="submit" onclick="myFunction7()" value="submit" style="visibility: hidden" class="btn btn-info">modifer</button>
    </form>
    <button onclick="myFunction4()"  style="visibility: visible" class="btn btn-round btn-cyan">modifier les données</button>

  </div>

@endsection