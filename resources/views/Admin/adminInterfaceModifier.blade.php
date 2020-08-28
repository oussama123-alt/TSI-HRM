@extends('layouts.appadmin')

@section('content')



    
    <!-- Content -->
    <div id="content">
     
      <div class="container-fluid">
        
        <span style="float:left ;padding-right:700px;"><h1> modifier:</h1></span>
     
       
          
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">jour</th>
                <th scope="col">debut de travaille</th>
                <th scope="col">debut pause</th>
                <th scope="col">fin pause</th>
                <th scope="col">fin de travaille</th>
                <th scope="col">heures de travaille</th>
                <th scope="col">modifier</th>

              </tr>
            </thead>
            <tbody>
            </tbody>
            </table> 
            <table class="table">
              <thead class="thead-dark">
              <tr>
                <td scope="row">{{$log->day}}</td>
                <td><form class="form-inline" action="{{ action('login_tabsController@postDataForm') }}" method="POST">  
                  {!! csrf_field() !!}
                
                <input style="margin-right: 100px;" type="time" id="start-time1"  value="{{$log->started_at1}}" onchange="myFunction()" class="form-control"  name="started_at1"   >
                <input style="margin-right: 80px;" type="time" id="end-time1" value="{{$log->finnish_at1}}" onchange="myFunction()" class="form-control"  name="finnish_at1"  >
                <input style="margin-right: 80px;" type="time" id="start-time2" value="{{$log->started_at2}}" onchange="myFunction()"  class="form-control" name="started_at2"  >
                <input style="margin-right: 80px;" type="time" id="end-time2"  value="{{$log->finish_at2}}"  onchange="myFunction()" class="form-control" name="finish_at2"   >
                <input type="hidden" value="{{ $log->id }}" name="log_id">
                <input type="hidden" value="{{ $log->user_id }}" name="user_id">
                <input style="margin-right: -80px;" type="text" id="total-hours" placeholder="{{$log->totale}}" readonly>
                <button style="margin-left: 80px;" type="submit" value="submit" class="btn btn-info">modifier</button>
                </form></td>
               </tr>
          </thead>
              
              
    
            
         
          
          
      </div>
    </div>
  
  

@endsection