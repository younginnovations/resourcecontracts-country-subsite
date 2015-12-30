@extends('layout.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Manage Pages</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Page Title</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as   $key => $page)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$page->title->en}}</td>
                        <td>{{$page->slug}}</td>
                        <td>
                            <a target="_blank" class="btn btn-success" href="{{url($page->slug)}}">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="{{route('admin.page.edit', ['slug'=>$page->slug])}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
