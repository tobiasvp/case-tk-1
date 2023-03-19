<!DOCTYPE html>
<html>

<head>
    <title>Stream Video </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

</head>

<body>
    <div class="row">
        <div class="container">
            <h2 class="text-center my-5">Stream Video </h2>

            <div class="col-lg-8 mx-auto my-5">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    </div>
                @endif

                <form action="/upload" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <b>Upload video (.MP4 only)</b><br />
                        <input type="file" name="file">
                    </div>

                    <div class="form-group">
                        <b>Video Name : </b>
                        <textarea class="form-control" name="name"></textarea>
                    </div>

                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>

                <h4 class="my-5">List Video Uploaded</h4>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%">Video</th>
                            <th>Name</th>
                            <th width="1%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($video as $v)
                            <tr>
                                <td>
                                    <video width="320" height="240" controls>
                                        <source src="{{ URL::asset('/videos/' . $v->file) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td>{{ $v->name }}</td>

                                <td>
                                    <!-- <form action="/edit" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="submit" value="Edit Name" class="btn btn-secondary">
                            </form> -->

                                    <a href="{{ route('video.edit', $v->id) }}" class="btn btn-secondary"
                                        data-toggle="modal" data-target="#exampleModal">Edit</a>
                                    <!-- <form method="post" action="{{ route('video.edit', $v->id) }}">
        @method('put')
        @csrf
        <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#editModal" data-whatever="{{ $v->name }}">Edit</button>
       </form> -->
                                    <form method="post" action="{{ route('video.destroy', $v->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>





                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">New message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="/update" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <b>Upload video (.MP4 only)</b><br />
                                        <input type="file" name="file">
                                    </div>

                                    <div class="form-group">
                                        <b>Video Name : </b>
                                        <textarea class="form-control" name="name"></textarea>
                                    </div>

                                    <input type="submit" value="Upload" class="btn btn-primary">
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>


</body>

</html>
