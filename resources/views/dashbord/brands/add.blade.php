@extends('layouts.adminStatic')
@section('addBrand')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/brand/add.add-brand')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/brand/add.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/brand/add.brand')}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div>
        <form method="POST"  action="{{route('admin.storeBrands')}}" enctype="multipart/form-data">
            <hr>
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-12 text-center">{{__("admin/brand/add.Slug")}}</label>
                    <input  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/brand/add.slug_ph')}}">
                    <input hidden  name="admin_create" value="{{Auth::user()->name}}">
                    @error ("slug")
                    <blockquote class="quote-danger">
                        <p style="color: #dc3545"> {{$message}}</p>
                    </blockquote>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group">
                    <label class="col-12 text-center">{{__("admin/brand/add.image-brand")}}</label>
                    <div class="custom-file">
                        <input name="image"  class="custom-file-input" id="exampleInputFile"  type="file" >
                        <label class="custom-file-label" for="exampleInputFile">{{__('admin/brand/add.Choose_file')}}</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{__('admin/brand/add.upload_file')}}</span>
                    </div>
                </div>
                @error ("image")
                <blockquote class="quote-danger">
                    <p style="color: #dc3545"> {{$message}}</p>
                </blockquote>
                @enderror
            </div>
            <hr>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <section class="content">
                <div class="container-fluid">
                    <!-- add cat -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{__('admin/brand/add.' . $localeCode . '_add')}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__("admin/brand/add.name")}}</label>
                                        <input  name="brand[{{$localeCode}}][name]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/brand/add.name_ph_". $localeCode)}}">
                                        <input hidden name="brand[{{$localeCode}}][locale]"  value="{{$localeCode}}">
                                        @error ("brand[ar][locale]")
                                        <span class="danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        <div class="form-group">
                                        <label>{{__("admin/brand/add.description")}}</label>
                                        <input  name="brand[{{$localeCode}}][description]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/brand/add.description_ph_" . $localeCode)}}">
                                        @error ("brand[{{$localeCode}}][description]")
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <span class="font-weight-bold bg-warning"><i class="note-icon-eraser"></i>{{__("admin/brand/add.notice_locale")}}</span>
                            <span>{{__("admin/brand/add.notice_locale_contact_" . $localeCode )}}</span>

                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            @endforeach
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{__("admin/brand/add.submit")}}</button>
                <a  class="btn btn-danger float-right" href="{{route('Dashbord')}}">{{__("admin/brand/add.Cancel")}}</a>
            </div>
        </form>

        <!-- /.content -->
    </div>


@endsection
