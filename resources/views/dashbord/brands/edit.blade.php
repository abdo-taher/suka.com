@extends('layouts.adminStatic')
@section('editBrand')



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
            <form method="POST"  action="{{route('admin.updateCategories',$category->id)}}" enctype="multipart/form-data">
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
                                    @foreach($allCategory as $categories)
                                        <option {{$categories->id == $category->id ? "selected" : ""}} value="{{$categories ->id}}" >{{$categories -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error ("parent_id")
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-12 text-center">{{__("admin/category/add.Slug")}}</label>
                        <input value="{{$category->slug}}"  name="slug" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__('admin/category/add.slug_ph')}}">
                        <input value="{{$category->admin_create}}" hidden  name="admin_create" value="{{Auth::user()->name}}">
                        <input hidden name="type" value="{{$type}}">
                        @error ("slug")
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group">
                        <label class="col-12 text-center">{{__("admin/category/add.image-cat")}}</label>
                        <div class="custom-file">
                            <input value="{{$category->image}}" name="image"  class="custom-file-input" id="exampleInputFile"  type="file" >
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
                @foreach($catTrans as $key => $category)
                    <section class="content">
                        <div class="container-fluid">
                            <!-- add cat -->
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('admin/category/add.' . $category->locale . '_' .$type)}}</h3>

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
                                                <input value="{{$category->name}}"  name="category[{{$key}}][name]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/category/add.name_ph")}}">
                                                <input value="{{$category->id}}"  name="category[{{$key}}][id]" type="text">
                                                {{--                                        @error ("name")--}}
                                                {{--                                        <div class="alert alert-danger">{{$message}}</div>--}}
                                                {{--                                        @enderror--}}
                                            </div>
                                            <div class="form-group">
                                                <label>{{__("admin/category/add.description")}}</label>
                                                <input  value="{{$category->description}}" name="category[{{$key}}][description]" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{__("admin/category/add.description_ph")}}">
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
                                    <span>{{__("admin/category/add.notice_locale_contact_" . $category->locale )}}</span>

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
