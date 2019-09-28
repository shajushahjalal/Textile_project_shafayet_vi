@extends('backEnd.masterPage')
@section('mainPart')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="box-shadow text-center">
                    <img src="{{asset($data->image)}}" class=" img-fluid rounded-circle"> 
                    <hr/>                               
                    {{ Auth::user()->name }}<br>
                    <small>{{ $data->email }}</small> <br>
                    <small>{{ $data->address }}</small>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="box-shadow">
                    <h5>Profile Information</h5>
                    <hr/>
                    {!! Form::open(['url'=>'profile/update','method' => 'post', 'files' => 'true',]) !!}
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span> </label>
                                <input type="hidden" name="user_id" value="{{$data->id}}">
                                <input type="text" placeholder="your First Name" value="{{ $data->firstName }}" name="firstName" class="form-control" required >
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <!-- Last Name -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Last Name  </label>
                                <input type="text" placeholder="your Last Name"  value="{{ $data->lastName }}" name="lastName" class="form-control" >
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Address -->
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span> </label>
                                <input type="text" placeholder="your Address Here" value="{{ $data->address }}" name="address" class="form-control" required >
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
    
                        <!-- City -->
                        <div class="col-6 col-sm-6">
                            <div class="form-group">
                                <label>City <span class="text-danger">*</span> </label>
                                <input type="text" placeholder="City" value="{{ $data->city }}" name="city" class="form-control" required >
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                         <!-- Zip Code -->
                        <div class="col-6 col-sm-6">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" placeholder="Zip / Postal code" value="{{ $data->zip }}" name="zip" class="form-control"  >
                            </div>
                        </div> 
    
                        <!-- Country -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Country </label>
                                <select name="country" class="form-control"  >
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->country}}" {{$data->country == $country->country?'Selected':null}} >{{$country->country}}</option>
                                    @endforeach
                                </select>     
                            </div>
                        </div> 
                        @if($self_edit == 1)
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>State </label>
                                    <input type="text" placeholder="State" value="{{$data->state}}" name="state" class="form-control" >                                     
                                </div>                                  
                            </div>                  
        
                            <!-- Phone Number -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Phone Number </label>
                                    <input type="text" minlength="9" max="15" value="{{ $data->phoneNo }}" name="phoneNo" class="form-control" autocomplete="phoneNo">                                
                                </div> 
                            </div>
                        
                            <!-- Profile Image -->
                            <div class="col-12 col-sm-12">
                                <div class="form-group"> 
                                    <input type="file" name="image" accept="image/*">
                                </div>
                            </div>
                        @else
                            <div class="col-12 col-sm-6">
                                <div class=" form-group">
                                    <label>User Role</label>
                                    <select class="form-control" name="is_admin" id="is_admin" required >
                                        <option value="0" {{$data->is_admin ==0 ? 'selected':null}} >User</option>
                                        <option value="1" {{$data->is_admin ==1 ? 'selected':null}}>Admin</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <!-- From Submit -->
                        <div class="col-12">
                            <div class=" form-group"> 
                                <button class="btn btn-primary form-control" id="submit" type="submit" >Update Information</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- Password reset -->
                @if($self_edit == 1)
                <div class="box-shadow">
                    <h5>Change Password</h5>
                    <hr/>
                    {!! Form::open(['url'=>'profile/update-password','method' => 'post',]) !!}
                    <input type="hidden" name="user_id" value="{{$data->id}}">
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>                                
                                <input id="password" type="password"  placeholder="New Password" class="form-control is-invalid" name="password" required autocomplete="new-password">                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                        
                        </div>
                        <div class="col-12 col-sm-8">
                            <div class=" form-group">
                                <label>Confirm Password <span class="text-danger">*</span></label>
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control is-invalid" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4" id="pass-feedback">
    
                        </div>
                        <div class="col-12 col-sm-8">
                            <button class="btn btn-danger form-control" type="submit" >Update Password</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        $('#password').keyup(function(){
            if($('#password').val().length >= 8 ){
                $('#password').removeClass('is-invalid');
                $('#password').addClass('is-valid'); 
                confirmPassword.keyup();
            }else{
                //password-confirm $('#pass-feedback').html(`<span class="invalid-feedback" role="alert">Password Required 8 digit</span>`);
                $('#password').addClass('is-invalid');                
                $('#password').removeClass('is-valid');
                confirmPassword.keyup();
                
                
            }
        });
        var confirmPassword = $('#password-confirm').keyup(function(){
            if( $('#password-confirm').val() == $('#password').val() && $('#password-confirm').val().length >= 8 ){
                $('#password-confirm').removeClass('is-invalid');
                $('#password-confirm').addClass('is-valid'); 
                $('#pass-feedback').html(`<br><small class="text-success">Password Matched </small>`);
            }else{                
                $('#password-confirm').addClass('is-invalid');                
                $('#password-confirm').removeClass('is-valid'); 
                $('#pass-feedback').html(`<small class="text-danger">Password Dosen't Matched OR required 8 digit</small>`);
            }
        });
        $('#is_admin').change(function(){
            if( $('#is_admin').val() == 1 ){
                if( !confirm('You Select The User As Admin.Now this user can Access Admin Panel') ){
                    $('#is_admin').val(0);
                }
            }
        });
    </script>
@endsection