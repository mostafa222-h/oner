@extends('layouts.layout')

@section('title','Send Email')
@section('content')

   <div class="row justify-content-md-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                 @lang('notification.send_email')
               </div>
               <div class="card-body">
                   <form action="{{route('notification.send.email')}}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label for="user"> @lang('notification.users')</label>
                           <select name="user" class="form-control" id="user">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name }}</option>
                                @endforeach

                           </select>
                       </div>
                       <div class="form-group">
                           <label for="email_type"> @lang('notification.email_type')</label>
                           <select name="email_type" class="form-controll" id="email_type">
                           @foreach ($emailTypes as $key => $type)
                                   <option value="{{$key}}">{{$type}}</option>
                           @endforeach
                           </select>
                       </div>
                       <button type="submit" class="btn btn-info">@lang('notification.send')</button>
                   </form>
               </div>
           </div>
       </div>
   </div>


@endsection
