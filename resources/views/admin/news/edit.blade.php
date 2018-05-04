@extends('CMS.Admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Layout</a></li>
                <li class="active">Top Navigation</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="form">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Blog Content</h3>
                    <a href="{{route('blog.index')}}" class="pull-right" data-toggle="tooltip" title="Go Back"><i class="fa fa-arrow-circle-left fa-2x" ></i></a>
                </div>

                 {!! Form::model($blog, ['method' => 'PUT','files'=>true,'route' => ['blog.update', $blog->id]]) !!}

                {{csrf_field()}}
                <div class="box-body">

                    <div class="row">

                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-0 col-sm-6">

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <!-- <div class="input-group"> -->
                                    <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}" placeholder="Title">
                                <!-- </div> -->
                               <!--  <p class="help-block">Help Text here.</p> -->
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <input type="hidden" value="{{$blog->image}}" id="old_image" name="old_image">

                            <div class="form-group">
                                <label for="images">File:</label>
                               <!--  <div class="input-group"> -->
                                <input type="file" value="{{asset('CMS/image/'.$blog->image)}}" id="images" name="images">
                                <!-- </div> -->
                                
                                <!-- /.input group -->
                            </div>

                             <div class="form-group">
                                <label for="body">Content:</label>
                                <textarea id="body" name="body" rows="10" cols="60"  style="min-height: 150px">{{$blog->content}}
                             </textarea>

                            </div>
                            <!-- /.form group -->
        

                        </div>
                    
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-sm-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <!-- <button type="submit" class="btn btn-default bg-green">Save & Add New</button>
                        <button type="button" class="btn btn-default bg-gray">Save & Go Back</button>
                        <button type="submit" class="btn btn-default bg-red">Cancel</button> -->
                    </div>
                    <!-- /.box-footer -->
                </div>
            <!-- /.box -->
            {!! Form::close() !!}


            </div>
        </section>
        <!-- /.content -->
    <!-- </div> -->

    <!-- /.content-wrapper -->

@endsection