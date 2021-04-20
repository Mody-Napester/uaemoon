@extends('_layouts.dashboard')

@section('title') Social @endsection

@section('content')

    <!-- Page Heading -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Edit Social
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('social.update', $resource->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit '{{ $resource->name }}' Social</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="provider_id">Provider</label>
                                        <select class="form-control @if($errors->has('provider_id')) is-invalid @endif" id="provider_id" name="provider_id">
                                            @foreach($providers as $provider)
                                                <option @if($resource->provider_id == $provider->id) selected @endif value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('provider_id'))
                                            <div class="invalid-feedback">{{ $errors->first('provider_id') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="name">Name</label>
                                        <input class="form-control @if($errors->has('name')) is-invalid @endif"
                                               id="name" type="text" name="name"
                                               placeholder="Enter name .." value="{{ $resource->name }}">

                                        @if ($errors->has('name'))
                                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="link">Link</label>
                                        <input class="form-control @if($errors->has('link')) is-invalid @endif"
                                               id="link" type="text" name="link"
                                               placeholder="Enter link .." value="{{ $resource->link }}">

                                        @if ($errors->has('link'))
                                            <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
