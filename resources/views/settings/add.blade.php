@extends('_layouts.dashboard')

@section('title')
    - General Settings
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">{{trans('settings.general_settings')}}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {{Form::open(array('files' => true))}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Website Language</label>
                        <select required name="site_lang" class="form-control select2">
                            <option value="">Choose</option>
                            <option @if($settings['site_lang'] == 1) selected @endif value="1">Arabic</option>
                            <option @if($settings['site_lang'] == 2) selected @endif value="2">English</option>
                            <option @if($settings['site_lang'] == 3) selected @endif value="3">Both</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Website Title [AR]</label>
                        <input required type="text"
                               value="{{$settings['title_ar']}}"
                               name="title_ar"
                               class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Website Title [EN]</label>
                        <input required type="text"
                               value="{{$settings['title_en']}}"
                               name="title_en"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Logo [AR]</label>
                        <input type="file"
                               value="{{$settings['logo_ar']}}"
                               name="logo_ar"
                               class="form-control">
                        <small>Recommended dimension 180x70</small>
                        <br>
                        @if(!empty($settings['logo_ar']))
                            <img src="{{asset($settings['logo_ar'])}}" width="100" height="100">
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label>Logo [EN]</label>
                        <input type="file"
                               value="{{$settings['logo_en']}}"
                               name="logo_en"
                               class="form-control">
                        <small>Recommended dimension 180x70</small>
                        <br>
                        @if(!empty($settings['logo_en']))
                            <img src="{{asset($settings['logo_en'])}}" width="100" height="100">
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>Mobile</label>
                        <input required type="text"
                               value="{{$settings['mobile']}}"
                               name="mobile"
                               class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Phone</label>
                        <input type="text"
                               value="{{$settings['phone']}}"
                               name="phone"
                               class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>WhatsApp</label>
                        <input type="text"
                               value="{{$settings['whatsapp']}}"
                               name="whatsapp"
                               class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input required type="email"
                               value="{{$settings['email']}}"
                               name="email"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Website URL</label>
                        <input type="text"
                               value="{{$settings['website']}}"
                               name="website"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Address [AR]</label>
                        <input type="text"
                               value="{{$settings['address_ar']}}"
                               name="address_en"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Address [EN]</label>
                        <input type="text"
                               value="{{$settings['address_en']}}"
                               name="address_ar"
                               class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-sm btn-info" type="submit">Save</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop
