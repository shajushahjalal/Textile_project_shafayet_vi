@extends('backEnd.masterPage')
@section('mainPart')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="box-shadow">
                    <h5>Create User</h5>
                    <hr/>
                    {!! Form::open(['url'=>'user/create','method' => 'post', 'files' => 'true','id'=>'ajax-form']) !!}
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span> </label>                                
                                <input type="text" placeholder="your First Name" name="firstName" class="form-control" required >
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <!-- Last Name -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Last Name  </label>
                                <input type="text" placeholder="your Last Name"  name="lastName" class="form-control" >
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="col-12 col-sm-12 col-md-3">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span> </label>
                                <input type="email" placeholder="example@gmail.com" name="email" class="form-control" required >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <!-- Address -->
                        <div class="col-12 col-sm-12 col-md-3">
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span> </label>
                                <input type="text" placeholder="your Address Here" name="address" class="form-control" required >
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
    
                        <!-- City -->
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>City <span class="text-danger">*</span> </label>
                                <input type="text" placeholder="City" name="city" class="form-control" required >
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                         <!-- Zip Code -->
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" placeholder="Zip / Postal code" name="zip" class="form-control"  >
                            </div>
                        </div> 
    
                        <!-- Country -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Country </label>
                                <select name="country" class="form-control"  >
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->country}}" >{{$country->country}}</option>
                                    @endforeach
                                </select>     
                            </div>
                        </div> 
                        <div class="col-12 col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>State </label>
                                    <input type="text" placeholder="State" name="state" class="form-control" >                                     
                                </div>                                  
                            </div>                  
    
                        <!-- Phone Number -->
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Phone Number </label>
                                <input type="text" minlength="9" max="15" name="phoneNo" class="form-control" autocomplete="phoneNo">                                
                            </div> 
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
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
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class=" form-group">
                                <label>Confirm Password <span class="text-danger">*</span></label>
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control is-invalid" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3" id="pass-feedback"></div>
                        
                        <div class="col-12 col-sm-6">
                            <div class=" form-group">
                                <select class="form-control" name="is_admin" required >
                                    <option value="0" selected >User</option>
                                    <option value="1" >Admin</option>
                                </select>
                            </div>
                        </div>
                        <!-- Profile Image -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group"> 
                                <input type="file" name="image" accept="image/*">
                            </div>
                        </div>    
                        <!-- From Submit -->
                        <div class="col-12">
                            <div class="form-group"> 
                                <button class="btn btn-primary form-control" id="submit" type="submit" >Add Information</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>                
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
    </script>
@endsection