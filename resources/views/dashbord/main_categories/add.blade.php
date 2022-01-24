@extends('layouts.adminStatic')
@section('addCat')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/category/add.add-cat_'.$type)}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/category/add.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/category/add.categories_'.$type)}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div>
        <form method="POST"  action="{{route('admin.storeCategories')}}" >
            <hr>
            @csrf
            @if($type == "sub")
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-12 text-center">
                        {{__("admin/category/add.main_category")}}</label>
                    <div class="form-group">
                        <select name="parent_id" class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">{{__('admin/category/add.mainCategoryPh')}}</option>
                            <option value="Alabama" >Alabama</option>
                        </select>
                    </div>
                    @error ("parent_id")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <input hidden name="type" value="sub">
                </div>
            </div>
            @endif

            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-12 text-center">{{__("admin/category/add.Slug")}}</label>
                    <input  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/category/add.slug_ph')}}">
                    @error ("slug")
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group">
                    <label class="col-12 text-center">{{__("admin/category/add.image-cat")}}</label>
                    <div class="custom-file">
                        <input name="image"  class="custom-file-input" id="exampleInputFile"  type="file" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                @error ("image")
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <hr>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
{{--                <a class="dropdown-item active" rel="alternate" hreflang="{{ $localeCode }}" href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
{{--                    <i class="flag-icon flag-icon-{{ $properties['native'] == 'English' ? 'us' : 'eg'}} "></i>--}}
{{--                    {{ $properties['name']}}--}}
{{--                </a>--}}

            <section class="content">
                <div class="container-fluid">
                    <!-- add cat -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{__('admin/category/add.' . $localeCode . '_' .$type)}}</h3>

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
                                        <label>{{__("admin/category/add.name")}}</label>
                                        <input  name="category[{{$localeCode}}][name]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/category/add.name_ph")}}">
                                        <input hidden name="category[{{$localeCode}}][locale]"  value="{{$localeCode}}">
{{--                                        @error ("name")--}}
{{--                                        <div class="alert alert-danger">{{$message}}</div>--}}
{{--                                        @enderror--}}
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <span class="font-weight-bold bg-warning"><i class="note-icon-eraser"></i>{{__("admin/category/add.notice_locale")}}</span>
                            <span>{{__("admin/category/add.notice_locale_contact_" . $localeCode )}}</span>

                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            @endforeach
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{__("admin/category/add.submit")}}</button>
{{--                <button  class="btn btn-danger float-right"><a href="{{redirect()->back()}}"></a>{{__("admin/category/add.Cancel")}}</button>--}}
            </div>
        </form>

        <!-- /.content -->
    </div>


@endsection
