@extends('layouts.app')

@section('content')


  <!-- Content -->
  <div id="content">
    <table class="table table-hover">
        <thead>
          
        </thead>
        <tbody>
          <tr>
            <th scope="row">nom de poste</th>
          <td>{{$poste->name}}</td>
          </tr>
          <tr>
            <th scope="row">discription</th>
          <td>{{$poste->discription}}</td>
          </tr>
          <tr>
            <th scope="row">nombre de postes</th>
          <td colspan="2">{{$poste->nbr_postes}}</td>
          </tr>
          <tr>
            <th scope="row">candidats pour cette poste</th>
           
          <td colspan="2"> @foreach($candidats as $candidat)<a href="{{url('/resp_recrut/'.'candidats/'.$candidat->id)}}">{{$candidat->name.'| '}}</a> @endforeach</td>
         
          </tr>
        </tbody>
      </table>
    

  </div>



@endsection