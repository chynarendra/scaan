@extends('CMS.Admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page
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
                    <h3 class="box-title">Add Pages</h3>
                    <a href="{{route('page.index')}}" class="pull-right" data-toggle="tooltip" title="Go Back"><i class="fa fa-arrow-circle-left fa-2x" ></i></a>
                </div>

                {!! Form::open(array('route' => 'page.store','method'=>'POST','files'=>true)) !!}

                {{csrf_field()}}
                <div class="box-body">

                    <div class="row">

                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-0 col-sm-6">
                            
                            <div class="form-group">
                                    <label for="parent_page">Parent Page:</label>
                                    <select class="form-control" name="parent_page" id="parent_page">
                                        <option value=''>select option</option>

                                        @if(!empty($parent))
                                            @foreach($parent as $row)
                                            <option value='{{$row->id}}'>{{$row->page_title}}</option>
                                            
                                            @endforeach
                                        @endif
                                    </select>

                            </div>
                            <!-- /.form group -->

                             <div class="form-group">
                                <label for="page_title">Page Title:</label>
                                <input type="text" id="page_title" class="form-control" name="page_title" placeholder="page title">
                                @if($errors->has('page_title'))
                                     
                                    <p style="color: red;">{{$errors->first('page_title')}}</p>
                                    
                                @endif
                               
                            </div>
                            <!-- /.form group -->

                             <div class="form-group">
                                <label for="images">Image:</label>
                                <input type="file" id="images" name="images" placeholder="Input file">
                                @if($errors->has('images'))
                                     
                                    <p style="color: red;">{{$errors->first('images')}}</p>
                                    
                                @endif
                               
                            </div>
                            <!-- /.form group -->

                             <div class="form-group">
                                <label for="page_content">Content:</label>
                                <textarea id="page_content" name="page_content" rows="10" cols="60"  style="min-height: 150px">
                             </textarea>
                            </div>
                            <!-- /.form group -->
                        
                        </div>
                    
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-sm-12">
                        <button type="submit" class="btn btn-primary">Save</button>
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