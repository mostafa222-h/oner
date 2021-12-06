@extends('layouts.layout')

@section('title','Send Email')
@section('content')

   <div class="row justify-content-md-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   Card header
               </div>
               <div class="card-body">
                   <form action="" method="post">
                       <div class="form-group">
                           <label for="test">users</label>
                           <select class="form-control" id="test">
                               <option value="">USERS</option>
                               <option value="">USERS</option>
                               <option value="">USERS</option>
                               <option value="">USERS</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="test">Email Type</label>
                           <select name="test" class="form-controll" id="test">
                               <option value="">Email Types</option>
                               <option value="">Email Types</option>
                               <option value="">Email Types</option>
                               <option value="">Email Types</option>
                           </select>
                       </div>
                       <button type="submit" class="btn btn-info">SEND</button>
                   </form>
               </div>
           </div>
       </div>
   </div>


@endsection
