@extends('layouts.appadmin')

@section('content')



    <!-- Sidebar -->
    
    <!-- Content -->
    <div id="content">
     
      <div class="container-fluid">
        
        <span style="float:left ;padding-right:700px;"><h1>liste de employees:</h1></span>
        <div class="search-container">
          <form method="POST" action="{{ url('/AdminInterface/filter')}}">
            {{ csrf_field() }}
            <input type="text" placeholder="Search by name" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">nom</th>
                <th scope="col">email</th>
                <th scope="col">id</th>
              
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
              <tr>
                <th scope="row">{{$user->name}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->id}}</td>
                <td><a href="{{url('/AdminInterface/'.$user->name)}}" class="btn btn-xs btn-info pull-left" >pointing</a></td>
               
                
              </tr>
              @endforeach
        
            </tbody>
          </table>
          
          
      </div>
  
  </div>

@endsection