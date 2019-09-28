@extends('backEnd.masterPage')
@section('mainPart')

    <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1">
        <div class="card" style="margin-top:2%;margin-bottom: 2%;">
            <div class="card-header bg-info">
                Website Settings
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>'website/setting','method'=>'post','files'=>true]) !!}
                <div class="form-group row">
                    <label for="applicationName" class="col-md-4 col-form-label text-md-right">Application Name*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control{{ $errors->has('applicationName') ? ' is-invalid' : '' }}" name="applicationName" value="{{ $system->applicationName }}" placeholder="Your Application / website Name" required autofocus>
                        @if ($errors->has('applicationName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('applicationName') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="titleName" class="col-md-4 col-form-label text-md-right">Application Title Name*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control{{ $errors->has('titleName') ? ' is-invalid' : '' }}" name="titleName" value="{{ $system->titleName }}" required placeholder="Your Website's title name">
                        @if ($errors->has('titleName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('titleName') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phoneNo" class="col-md-4 col-form-label text-md-right">Phone Number*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control{{ $errors->has('phoneNo') ? ' is-invalid' : '' }}" name="phoneNo" value=" {{ $system->phoneNo }}" required placeholder="Phone Number">
                        @if ($errors->has('phoneNo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phoneNo') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right" title="This email will be default email of your website">Email(Show in website)*</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value=" {{ $system->email }}" required placeholder="Email (This email will be default email of your website)">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="city" value="{{ $system->city }}"  placeholder="City">                                
                    </div>
                </div>
                <div class="form-group row">
                    <label for="zipCode" class="col-md-4 col-form-label text-md-right">zip /Postal Code</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="zipCode" value="{{ $system->zipCode }}"  placeholder="zip /Postal Code">                                
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                    <div class="col-md-6">
                         <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $system->address }}" >                                                                                     
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">Country*</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $system->country }}" required placeholder="Country">
                        @if ($errors->has('country'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="shippingCost" class="col-md-4 col-form-label text-md-right">Shipping Cost</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="shippingCost" placeholder="" value="{{$system->shippingCost}}" >          
                    </div>
                </div>
                <div class="form-group row">
                    <label for="currency" class="col-md-4 col-form-label text-md-right">Currency*</label>
                    <div class="col-md-6">
                        <select name="currency" class="form-control" required>
                                    <option value="" selected > Select Currency</option>
                                    <option value="BDT" {{ $system->currency == 'BDT'?'selected':''}} > BDT </option>
                                    <option value="USD" {{ $system->currency == 'USD'?'selected':'' }} > USD </option>
                                    <option value="CAD" {{ $system->currency == 'CAD'?'selected':'' }} > CAD </option>
                                    <option value="INR" {{ $system->currency == 'INR'?'selected':'' }} > INR </option>
                        </select>
                        @if ($errors->has('currency'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dateFormat" class="col-md-4 col-form-label text-md-right">Date Format*</label>
                    <div class="col-md-6">
                        <select name="dateFormat" required class="form-control">
                            <option value="d/m/Y" {{ $system->dateFormat == 'd/m/Y'?'selected':''}} > 16/03/2019 (DD/MM/Year) </option>
                            <option value="d-m-Y" {{ $system->dateFormat == 'd-m-Y'?'selected':''}} > 16-03-2019 (DD-MM-Year) </option>
                            <option value="Y/m/d" {{ $system->dateFormat == 'Y/m/d'?'selected':''}} > 2019/03/16 (Year/MM/DD) </option>
                            <option value="Y-m-d" {{ $system->dateFormat == 'Y-m-d'?'selected':''}} > 2019-03-16 (Year-MM-DD) </option>
                            <option value="m/d/Y" {{ $system->dateFormat == 'm/d/Y'?'selected':''}} > 03/16/2019 (MM/DD/Year) </option>
                            <option value="m-d-Y" {{ $system->dateFormat == 'm-d-Y'?'selected':''}} > 03-16-2019 (MM-DD-Year) </option>
                            <option value="d-M,y" {{ $system->dateFormat == 'd-M,y'?'selected':''}} > 16-March,2019 (DD-MM,Year) </option>                                    
                        </select>
                    </div>
                </div>                
                <div class="form-group row">
                    <label for="dateFormat" class="col-md-4 col-form-label text-md-right">Logo</label>
                    <div class="col-md-6">
                        <input type="file" name="logo" accept="image/*">
                        @if ($errors->has('logo'))
                        <span class="invalid-feedback" role="alert">
                             <strong>Only .jpeg .png, .jpg are allow</strong>
                        </span>
                        @endif
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="dateFormat" class="col-md-4 col-form-label text-md-right">Favicon Logo</label>
                    <div class="col-md-6">
                        <input type="file" name="favicon" accept="image/*">
                        @if ($errors->has('favicon'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$errors->get('favicon')}}</strong>
                        </span>
                        @endif
                    </div>
                </div> 
                <div class="form-group row">                    
                    <div class="col-md-6 offset-md-4">
                        <button class="btn btn-primary form-control">Update</button>
                    </div>                        
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection

