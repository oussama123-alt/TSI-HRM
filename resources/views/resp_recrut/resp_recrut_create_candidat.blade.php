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
                    <input type="text" class="form-control" id="nom" placeholder="Entrer nom" name="nom" required>
                  </div>
                  <div class="form-group">
                    <label for="surname">prenom:</label>
                    <input type="text" class="form-control" id="surname" placeholder="Entrer prenom" name="surname">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">Téléphone:</label>
                    <input type="int" class="form-control" id="phone" placeholder="Entrer numéro de telephone" name="phone" required>
                  </div>
                  <div class="form-group">
                    <label for="adress">Adresse:</label>
                    <input type="text" class="form-control" id="adress" placeholder="Entrer adresse" name="adress">
                  </div>
                  <div class="form-group">
                    <label for="disponibilité">disponibilité:</label>
                    <input type="date" class="form-control" id="disponibilité" placeholder="Entrer adresse" name="disponibilité" >
                  </div>
                  <div class="form-group">
                    <label for="salaire_min">salaire minimal souhaité (dt):</label>
                    <input type="number" class="form-control" id="salaire_min" placeholder="Entrer salaire" name="salaire_min">
                  </div>
                  <div class="form-group">
                    <label for="salaire_min">Travaille actuellement dans un poste similaire:</label><br>
                    <input type="radio" id="oui" name="poste_similaire" value="oui">
                    <label for="oui">oui</label><br>
                    <input type="radio" id="non" name="poste_similaire" value="non">
                    <label for="non">non</label><br>
                  </div>
                  <div class="form-group">
                    <label for="exp_years">années d'experiences:</label>
                    <input type="number" class="form-control" id="exp_years" placeholder="Entrer années d'experience" name="exp_years">
                  </div>
                  <div class="form-group">
                    <label for="langues">langues:</label>
                    <div id="dynamicInput">
                     <div>
                      <br><select name="langue"  class="langue">
                        <option value="arabe">arabe</option>
                        <option value="anglais">anglais</option>
                        <option value="francais">francais</option>
                        <option value="allemand">allemand</option>
                        </select>
                        <select name="nivaux" class="langue">
                          <option value="maternelle">maternelle</option>
                          <option value="courant">courant</option>
                          <option value="itérmediaire">intérmediaire</option>
                          <option value="debutant">debutant</option>
                        </select>
                       <button style="float: none;" type="button" onclick="myFunction5(this)" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                        <input name="lang" id="lang" type="hidden"> 
                 </div>
                 <button type="button" class="btn btn-success" onclick="myFunction2('dynamicInput')">ajouter une langue</button> 
                   
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
                  <button  type="submit" onclick="myFunction3()" value="submit" class="btn btn-info">Submit</button>
                </form>
                
     </div>
  </div>
</div>
 


@endsection