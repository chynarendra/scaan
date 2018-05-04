@extends('CMS.Admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->
            <!-- Content Header (Page header) -->
            @include('CMS.Admin.message.flash')
           
            <section class="content-header">
                <h1>
                    Pages

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
                        <h3 class="box-title">Page List</h3>
                        <a href="{{route('page.create')}}"  class="pull-right boxTopButton" data-toggle="tooltip" title="Add New"><i class="fa fa-plus-circle fa-2x"></i></a>
                        <a href="#"  class="pull-right boxTopButton" data-toggle="tooltip" title="View All"><i class="fa fa-list fa-2x"></i></a>
                        <a href="#" class="pull-right  boxTopButton" data-toggle="tooltip" title="Go Back"><i class="fa fa-arrow-circle-left fa-2x" ></i></a>

                    </div>
                    <div class="box-body">
                        
                        <div class="table-responsive">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">S.N</th>
                                <th class="text-left" style="width: 80px;">Parent Page</th>
                                <th class="text-left" style="width: 80px;">Page Title</th>
                                <th class="text-left">Content</th>
                                <th class="text-left">Image</th>
                                <th class="text-left">Status</th>
                                <th style="width: 100px" class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        @php($i=1)
                        @foreach ($pages as $p)
                            <tr>
                                <th scope=row>{{$i++}}</th>
                                <td>
                                    @foreach($parent as $row)
                                        @if($row->id==$p->parent_page)
                                        {{ $row->page_title}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{  $p->page_title }}</td>
                                <td>{{ str_limit($p->page_content,200)}}</td>
                                <td><img src="{{asset('CMS/image/'.$p->image)}}" width="100" height="100"></td>

                                <td>
                                
                                        @if($p->status=='active')
                                            <a type="button" class="btn btn-success" href="{{route('status',$p->id)}}">{{ $p->status}}</a>
                                        @else
                                             <a type="button" class="btn btn-danger" href="{{route('status',$p->id)}}">{{ $p->status}}</a>
                                        @endif

                                </td>
                            
                                <td class="text-left">
                                   
                                        <a href="{{ route('page.edit',$p->id)}}" class="text-info actionIcon" data-toggle="tooltip"
                                           data-placement="top" title="Edit">
                                            <i class="fa fa-pencil" ></i>
                                        </a>&nbsp;

                                       
                                         <form class="inline" method="post" action="{{ route('page.destroy',$p->id)}}">
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
