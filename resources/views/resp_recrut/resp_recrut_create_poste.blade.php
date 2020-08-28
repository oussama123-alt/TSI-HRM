@extends('layouts.app')

@section('content')


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



@endsection