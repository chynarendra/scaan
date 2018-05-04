@extends('CMS.Admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->
            <!-- Content Header (Page header) -->
            @include('CMS.Admin.message.flash')
           
            <section class="content-header">
                <h1>
                    Blog

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Layout</a></li>
                    <li class="active">Top Navigation</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
<!--                <div class="callout callout-info">-->
<!---->
<!--                </div>-->

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Content</h3>
                        <a href="{{route('blog.create')}}"  class="pull-right boxTopButton" data-toggle="tooltip" title="Add New"><i class="fa fa-plus-circle fa-2x"></i></a>
                        <a href="#"  class="pull-right boxTopButton" data-toggle="tooltip" title="View All"><i class="fa fa-list fa-2x"></i></a>
                        <a href="#" class="pull-right  boxTopButton" data-toggle="tooltip" title="Go Back"><i class="fa fa-arrow-circle-left fa-2x" ></i></a>

                    </div>
                    <div class="box-body">
                        
                        <div class="table-responsive">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">S.N</th>
                                <th class="text-left" style="width: 80px;">Posted By</th>
                                <th class="text-left" style="width: 80px;">Title</th>
                                <th class="text-left" style="width: 80px;">Image</th>
                                <th class="text-left">Content</th>
                                <th class="text-left">Created At</th>
                                <th class="text-left">Status</th>
                                <th style="width: 100px" class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        @php($i=1)
                        @foreach ($blog as $h)
                            <tr>
                                <th scope=row>{{$i++}}</th>
                                 <td>{{$username}}</td>
                                <td>{{  $h->title }}</td>
                                <td><img src="{{asset('CMS/image/'.$h->image)}}" width="100" height="100"></td>
                                <td>{{ str_limit($h->content,200)}}</td>
                               
                                <td>{{ $h->created_at}}</td>
                                <td>
                                
                                    @if($h->status=='active')
                                        <a type="button" class="btn btn-success" href="{{route('blogstatus',$h->id)}}">{{ $h->status}}</a>
                                    @else
                                         <a type="button" class="btn btn-danger" href="{{route('blogstatus',$h->id)}}">{{ $h->status}}</a>
                                    @endif

                                </td>
                            
                                <td class="text-left">
                                   
                                        <a href="{{ route('blog.edit',$h->id)}}" class="text-info actionIcon" data-toggle="tooltip"
                                           data-placement="top" title="Edit">
                                            <i class="fa fa-pencil" ></i>
                                        </a>&nbsp;

                                       
                                         <form class="inline" method="post" action="{{ route('blog.destroy',$h->id)}}">
                                            {{ csrf_field()}}
                                            {{ method_field('delete')}}
                                            <button type="submit" class=" text-danger" style="font-size:20px" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete ?')" 
                                               data-placement="top"  title="Delete">
                                                <i  class="fa fa-trash-o actionIcon deleteButton"></i>
                                            </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
    <!-- </div> -->

    <!-- /.content-wrapper -->

@endsection
