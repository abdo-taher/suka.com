@extends('layouts.adminStatic')
@section('viewCat')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('admin/category/main.cat-'.$type)}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin/category/add.home')}}</a></li>
                            <li class="breadcrumb-item active">{{__('admin/category/main.cat-' .$type)}}</li>
                        </ol>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
    <div class="card">
        <div class="card-header text-center">
            <button class="btn-block btn-primary text-center">{{__('admin/category/main.add-cat-'.$type)}}</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline " role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/category/main.id')}}</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">{{__('admin/category/main.name')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('admin/category/main.image')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('admin/category/main.slug')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">{{__('admin/category/main.status')}}</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{__('admin/category/main.setting')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                        @isset($category)
                            @foreach ($category as $categories)
                            <tr role="row" class="odd text-center">
                                <td>{{$categories->id}}</td>
                                <td>{{$categories->name}}</td>
                                <td><img class="img-circle" style="height: 80px ; width:80px" src="{{ asset('assets\image\avatar2.png')}}" alt=""></td>
                                <td>{{$categories->slug}}</td>
                                <td style="color:{{$categories->is_active == 0 ? '#0E9A00' : '#8c0615'}}">
                                    @if($categories->is_active == 0)
                                    <span class='badge badge-success'>{{__('admin/category/main.active')}}</span>
                                    @else
                                    <span class='badge badge-danger'>{{__('admin/category/main.inactive')}}</span>
                                    @endif
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right text-center" role="menu">
                                                <a href="#" class="dropdown-item">{{__('admin/category/main.detail') . $categories->name}}</a>
                                                <a href="#" class="dropdown-item">{{__('admin/category/main.edit') .$categories->name}}</a>
                                                <a href="#" class="dropdown-item">{{__('admin/category/main.delete') .$categories->name}}</a>
                                            </div>
                                        </div>

                                    </div>
                                </td>
{{--                                <td>--}}
{{--                                    <a title="{{__('add producte')}}" href="{{route('admin.deletesubcategories', $categories -> id )}}">--}}
{{--                                        <button type="button" class="btn btn-warning"><i class="fa fa-ad"></i></button>--}}
{{--                                    </a><br>--}}
{{--                                    <a alt="{{__('admin.active')}}" href="{{route('admin.activeCategories', $categories -> id )}}">--}}
{{--                                        <button rel="dlk" type="button" class="btn btn-{{$categories->is_active == 1 ? 'info' : 'danger'}}"><i class="ui-icon-{{$categories->is_active == 1 ? 'locked' : 'key'}}"></i></button>--}}
{{--                                    </a><br>--}}
{{--                                    <a alt="{{__('admin.edite')}}" href="{{route('admin.updateCategories', $categories -> id )}}">--}}
{{--                                        <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>--}}
{{--                                    </a><br>--}}
{{--                                    <a alt="{{__('admin.delete')}}" href="{{route('admin.deleteCategories', $categories -> id )}}">--}}
{{--                                        <button type="button" class="btn btn-danger"><i class="fa fa-clock"></i></button>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
                            </tr>
                            @endforeach
                        @endisset

                            </tbody>
                            <tfoot>
                            <tr>

                                <th rowspan="1" colspan="1">{{__('admin/category/main.id')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category/main.name')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category/main.image')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category/main.slug')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category/main.status')}}</th>
                                <th rowspan="1" colspan="1">{{__('admin/category/main.setting')}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</div>

{{--<div class="content-body">--}}

{{--    <div class="row page-titles mx-0">--}}
{{--        <div class="col p-md-0">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item"><a href="{{route('Dashbord')}}">{{__('admin.Home')}}</a></li>--}}
{{--                <li class="breadcrumb-item active"><a href="">{{__('admin.main_categories')}}</a></li>--}}
{{--            </ol>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- row -->--}}

{{--    <div class="container-fluid">--}}
{{--        @include('includes.admin.allert')--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6" >--}}
{{--                                <h2 class="card-title">{{__('admin.Categories-list')}}</h2>--}}
{{--                            </div>--}}
{{--                            <div class="col-6" >--}}
{{--                                <div class="dropdown custom-dropdown float-right">--}}
{{--                                    <div data-toggle="dropdown" aria-expanded="false">--}}
{{--                                        <i class="ti-more-alt"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(14px, 21px, 0px);">--}}
{{--                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'all')}}">All</a>--}}
{{--                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'main')}}">main</a>--}}
{{--                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'active')}}">active</a>--}}
{{--                                        <a class="dropdown-item" href="{{route('admin.selectcategories',$action = 'inactive')}}">inactive</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-striped table-bordered zero-configuration">--}}
{{--                                <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>--}}
{{--                                            <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox">--}}
{{--                                            </div>--}}
{{--                                        </th>--}}
{{--                                        <th>{{__('admin.ID')}}</th>--}}
{{--                                        <th>{{__('admin.NAME')}}</th>--}}
{{--                                        <th>{{__('admin.Translation_Lang')}}</th>--}}
{{--                                        <th>{{__('admin.Translation_Of')}}</th>--}}
{{--                                        <th>{{__('admin.Slug')}}</th>--}}
{{--                                        <th>{{__('admin.image')}}</th>--}}
{{--                                        <th>{{__('admin.Status')}}</th>--}}
{{--                                        <th>{{__('admin.Settings')}}</th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                    @isset($categorie)--}}
{{--                                    @foreach ($categorie as $categories)--}}
{{--                                        <tr style="text-align: center">--}}

{{--                                            <td class="text-bold-500">--}}
{{--                                                <div class="form-check">--}}
{{--                                                    <input class="form-check-input" type="checkbox">--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>{{$categories->id}}</td>--}}
{{--                                            <td>{{$categories->name}}</td>--}}
{{--                                            <td>{{$categories->language->name}}</td>--}}
{{--                                            <td>{{$categories->translation_of}}</td>--}}
{{--                                            <td>{{$categories->slug}}</td>--}}
{{--                                            <td><img class="" style="height: 100px ; width:100px" src="{{ asset('assets\images\faces\4.jpg')}}" alt="{{ __('abdo') }}"></td>--}}
{{--                                            <td style="color:{{$categories->active == 1 ? '#0E9A00' : '#8c0615'}}">{{$categories->active == 1 ? 'Active' : 'Inactive'}}</td>--}}
{{--                                            <td>--}}

{{--                                                <a title="{{__('add producte')}}" href="{{route('admin.deletesubcategories', $categories -> id )}}">--}}
{{--                                                    <button type="button" class="btn btn-outline-warning"><i class="fa fa-caret-square-o-up"></i></button>--}}
{{--                                                </a><br>--}}
{{--                                                <a alt="{{__('admin.active')}}" href="{{route('admin.activecategories', $categories -> id )}}">--}}
{{--                                                    <button rel="dlk" type="button" class="btn btn-outline-{{$categories->active == 1 ? 'info' : 'danger'}}"><i class="icon-{{$categories->active == 1 ? 'lock' : 'key'}}"></i></button>--}}
{{--                                                </a><br>--}}
{{--                                                <a alt="{{__('admin.edite')}}" href="{{route('admin.editcategories', $categories -> id )}}">--}}
{{--                                                    <button type="button" class="btn btn-outline-success"><i class="fa fa-edit"></i></button>--}}
{{--                                                </a><br>--}}
{{--                                                <a alt="{{__('admin.delete')}}" href="{{route('admin.deletecategories', $categories -> id )}}">--}}
{{--                                                    <button type="button" class="btn btn-outline-danger"><i class="fa fa-close"></i></button>--}}
{{--                                                </a>--}}


{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                @endisset--}}
{{--                                </tbody>--}}
{{--                                <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>--}}
{{--                                            <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox">--}}
{{--                                            </div>--}}
{{--                                        </th>--}}
{{--                                        <th>{{__('admin.ID')}}</th>--}}
{{--                                        <th>{{__('admin.NAME')}}</th>--}}
{{--                                        <th>{{__('admin.Translation_Lang')}}</th>--}}
{{--                                        <th>{{__('admin.Translation_Of')}}</th>--}}
{{--                                        <th>{{__('admin.Slug')}}</th>--}}
{{--                                        <th>{{__('admin.Image')}}</th>--}}
{{--                                        <th>{{__('admin.Status')}}</th>--}}
{{--                                        <th>{{__('admin.Settings')}}</th>--}}
{{--                                    </tr>--}}
{{--                                </tfoot>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




@endsection
