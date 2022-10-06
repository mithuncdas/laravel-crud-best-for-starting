<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">All Blogs</div>
                            <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm text-end">Create Blog</a>
                        </div>
                        <div class="card-body">
                            @if (Session::has('blog_create_success'))
                                <div class="alert alert-success">
                                    {{ Session::get('blog_create_success') }}
                                </div>   
                            @endif
                            @if (Session::has('blog_delete_success'))
                                <div class="alert alert-danger">
                                    {{ Session::get('blog_delete_success') }}
                                </div>   
                            @endif
                            <table class="table table-striped">
                               <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                               </thead>
                               <tbody>
                               @forelse ($blogs as $blog)
                                <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td><span class="badge {{ $blog->status == 'Active'?'bg-success':'bg-danger' }}">{{ $blog->status }}</span></td>
                                        <td>
                                            <a href="{{route('blog.show',$blog->id) }}" class="btn btn-sm btn-primary">Show</a>
                                            <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ route('blog.delete',$blog->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                               @empty
                                   <tr>
                                    <td colspan="4" class="text-center">No Blog Found</td>
                                   </tr>
                               @endforelse
                                
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</html>
