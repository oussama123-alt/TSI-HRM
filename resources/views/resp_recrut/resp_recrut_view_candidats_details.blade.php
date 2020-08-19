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
    <form action="{{ action('resp_recrutController@modifierCandidat') }}" method="POST" enctype="multipart/form-data">
      {!! csrf_field() !!}
    <table class="table table-hover">
        <thead>
          
        </thead>
        <tbody>
         
          <tr>
            <th scope="row">nom</th>
          <td class="default" style="visibility: visible">{{$candidat->name}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->name}}" name="nom" type="text">
            <input name="id" value="{{$candidat->id}}" type="hidden"></td>
         </tr>
          
          <tr>
            <th scope="row">prénom</th>
          <td class="default" style="visibility: visible">{{$candidat->surname}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->surname}}" name="surname" type="text"></td>
          
          </tr>
          <tr>
            <th scope="row">email</th>
          <td class="default" style="visibility: visible">{{$candidat->email}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->email}}"  name="email" type="email"></td>
          </tr>
          <tr>
            <th scope="row">numéro de télephone</th>
          <td class="default" style="visibility: visible">{{$candidat->phone}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->phone}}"name="phone" type="number"></td>
          </tr>
          <tr>
            <th scope="row">adress</th>
            <td class="default" style="visibility: visible" >{{$candidat->adress}}</td>
            <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->adress}}" name="adress" type="text"></td>
           </tr>
           <tr>
            <th scope="row">status</th>
          <td class="default" style="visibility: visible">{{$candidat->status}}</td>
          <td class="modifier" style="visibility: hidden"> <select name="status"> 
                                                          <option value="{{$candidat->status}}">{{$candidat->status}}</option>
                                                          <option value="pending">pending</option>
                                                          <option value="refusé">refusé</option>
                                                          <option value="accepté">accepté</option>
                                                        </select>
          </td>
          </tr> 
          <tr>
            <th scope="row">langues</th>
          <td class="default" style="visibility: visible">{{$candidat->langues}}</td>
          <td class="modifier" style="visibility: hidden"> <div id="dynamicInput">
          
           @foreach ( explode('|', $candidat->langues) as $langue)
           <div>
           <br><select name="langue" class="langue">
           <option value="{{substr($langue, 0, strpos($langue, ':'))}}">{{substr($langue, 0, strpos($langue, ':'))}}</option>
           <option @if(substr($langue, 0, strpos($langue, ':')) =='arabe')
            style="display: none" 
            @endif value="arabe">arabe</option>
            <option @if(substr($langue, 0, strpos($langue, ':'))=='anglais')
            style="display: none" 
            @endif value="anglais">anglais</option>
            <option  @if(substr($langue, 0, strpos($langue, ':'))=='francais')
            style="display: none" 
            @endif value="francais">francais</option>
            <option  @if(substr($langue, 0, strpos($langue, ':'))=='allemand')
            style="display: none" 
            @endif value="allemand">allemand</option>
            </select>
            <select name="nivaux" class="langue">
              <option value="{{substr($langue,strpos($langue, ':')+1,  )}}">{{substr($langue,strpos($langue, ':')+1,  )}}</option>
              <option @if(substr($langue,strpos($langue, ':')+1,  )=='maternelle')
              style="display: none" 
              @endif value="maternelle">maternelle</option>
              <option @if(substr($langue,strpos($langue, ':')+1,  )=='courant')
              style="display: none" 
              @endif value="courant">courant</option>
              <option @if(substr($langue,strpos($langue, ':')+1,  )=='intérmediaire')
              style="display: none" 
              @endif value="itérmediaire">intérmediaire</option>
              <option @if(substr($langue,strpos($langue, ':')+1,  )=='debutant')
              style="display: none" 
              @endif value="debutant">debutant</option>
            </select> 
            <button style="float: none;" type="button" onclick="myFunction5(this)" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           @endforeach
           
              <input name="lang" id="lang" type="hidden"> 
       </div>
       <button type="button" class="btn btn-success" onclick="myFunction2('dynamicInput')">ajouter une langue</button></td>
          </tr> 
          <tr>
            <th scope="row">disponibilité</th>
          <td class="default" style="visibility: visible">{{$candidat->disponibilité}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->disponibilité}}" name="disponibilité" type="date"></td>
          </tr> 
          <tr>
            <th scope="row">salaire minimum souhaité</th>
          <td class="default" style="visibility: visible">{{$candidat->salair_min}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->salair_min}}" name="salaire_min" type="number"></td>
          </tr> 
          <tr>
            <th scope="row">Travaille actuellement dans un poste similaire</th>
          <td class="default" style="visibility: visible">{{$candidat->poste_similaire}}</td>
          <td class="modifier" style="visibility: hidden"><input type="radio" id="oui" name="poste_similaire" value="oui">
            <label for="oui">oui</label><br>
            <input type="radio" id="non" name="poste_similaire" value="non">
            <label for="non">non</label><br></td>
          </tr> 
          <tr>
            <th scope="row">annés d'experience</th>
          <td class="default" style="visibility: visible">{{$candidat->exp_years}}</td>
          <td class="modifier" style="visibility: hidden"> <input placeholder="{{$candidat->exp_years}}" name="exp_years" type="number"></td>
          
          </tr> 
         
        </tbody>
      </table>
      <button type="submit" onclick="myFunction3()" value="submit" style="visibility: hidden" class="btn btn-info">modifer</button>
    </form>
    <button onclick="myFunction4()"  style="visibility: visible" class="btn btn-round btn-cyan">modifier les données</button>

  </div>
</div>


@endsection