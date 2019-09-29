@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8" style="margin-top:2%;margin-bottom: 2%;">                
                @if(phpversion() >= 7.2)
                <div class="card" style="background: #999;opacity:.9; color:#fff;">
                    <div class="card-header">Install</div>
                    <div class="card-body">
                    {!! Form::open(['url'=>'install','method'=>'post','files'=>true]) !!}
                        <div class="form-group row">
                            <!-- First Row && First Column -->
                            <div class="col-md-6">
                                <label for="applicationName">Application Name*</label>
                                <input type="text" class="form-control{{ $errors->has('applicationName') ? ' is-invalid' : '' }}" name="applicationName" value="{{ old('applicationName') }}" placeholder="Your Application / website Name" required autofocus>
                                @if ($errors->has('applicationName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('applicationName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- First Row && Second Column -->
                            <div class="col-md-6">
                                <label for="titleName">Application Title Name*</label>
                                <input type="text" class="form-control{{ $errors->has('titleName') ? ' is-invalid' : '' }}" name="titleName" value="{{ old('titleName') }}" required placeholder="Your Website's title name">
                                @if ($errors->has('titleName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titleName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Second Row && First Column -->     
                            <div class="col-md-6">
                                    <label for="phoneNo">Phone Number*</label>
                                <input type="text" class="form-control{{ $errors->has('phoneNo') ? ' is-invalid' : '' }}" name="phoneNo" value="{{ old('phoneNo') }}" required placeholder="Phone Number">
                                @if ($errors->has('phoneNo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <!-- Second Row && Second Column -->                            
                            <div class="col-md-6">
                                <label for="email" title="This email will be default email of your website">Email(Show in website)*</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value=" {{ old('email') }}" required placeholder="Email (This email will be default email of your website)">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">                            
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}"  placeholder="City">                                
                            </div>
                            <div class="col-md-6">
                                <label for="zipCode">zip /Postal Code</label>
                                <input type="text" class="form-control" name="zipCode" value="{{ old('zipCode') }}"  placeholder="zip /Postal Code">                                
                            </div>
                        </div>
                        <div class="form-group row">                            
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" >                                                             
                            </div>
                            <div class="col-md-6">
                                <label for="country">Country*</label>
                                <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required placeholder="Country">
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" placeholder="State" value="{{ old('state') }}" >          
                            </div>
                            <div class="col-md-6">
                                <label for="shippingCost">Shipping Cost</label>
                                <input type="text" class="form-control" name="shippingCost" placeholder="" value="{{ empty(old('shippingCost'))?'0':old('shippingCost') }}" >          
                            </div>  
                        </div>
                        <div class="form-group row"> 
                            <div class="col-md-6">
                                <label for="currency" >Currency*</label>
                                <select name="currency" class="form-control" required>
                                    <option value="" selected > Select Currency</option>
                                    <option value="BDT"  > BDT </option>
                                    <option value="USD"  > USD </option>
                                    <option value="CAD"  > CAD </option>
                                    <option value="INR"  > INR </option>
                                </select>
                                @if ($errors->has('currency'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                                @endif
                            </div>                           
                            <div class="col-md-6">
                                <label for="dateFormat">Date Format*</label>
                                <select name="dateFormat" required class="form-control">
                                    <option value="d/m/Y"> 16/03/2019 (DD/MM/Year) </option>
                                    <option value="d-m-Y"> 16-03-2019 (DD-MM-Year) </option>
                                    <option value="Y/m/d"> 2019/03/16 (Year/MM/DD) </option>
                                    <option value="Y-m-d"> 2019-03-16 (Year-MM-DD) </option>
                                    <option value="m/d/Y"> 03/16/2019 (MM/DD/Year) </option>
                                    <option value="m-d-Y"> 03-16-2019 (MM-DD-Year) </option>
                                    <option value="d-M,y"> 16-March,2019 (DD-MM,Year) </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="logo" >Logo</label><br>
                                <input type="file" name="logo" accept="image/*">
                                @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Only .jpeg .png, .jpg are allow</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="favicon">Favicon Logo</label><br>
                                <input type="file" name="favicon" accept="image/*">
                                @if ($errors->has('favicon'))
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @endif
                            </div>
                        </div>                                               
                    <div class="form-group text-right">
                        <button class="btn btn-primary " type="submit" id ="install_btn" >Install</button>
                    </div>
                    {!!Form::close()!!}
                    </div>
                </div>
                @else
                    <div class="alert alert-danger">
                        To Install this Application you have required php version 7.2.19 or higher. Your current php version is <b>{{ phpversion() }}</b>  .
                        <br>Please install php version <b>7.2.19</b> or higher and try again.
                    </div>
                @endif                
            </div>     
        </div>
    </div>
@endsection
<script>
    $('#install_btn').click(function(){
        $(this).attr('disabled',true);
    });
</script>
