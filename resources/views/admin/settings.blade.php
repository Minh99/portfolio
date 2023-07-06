<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Start your development with Steller landing page.">
    <meta name="author" content="Devcrud">
    <meta icon="icon" href="{{ asset('assets/imgs/logo.png') }}">
    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css') }}">
    <!-- Bootstrap + Steller main styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/steller.css') }}">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <form action="{{ route('settings') }}" method="POST" class="container mt-4">
        @csrf
        <div class="row">
            <div class="form-group col-6 mx-4">
                <input class="form-control" type="text" name="name" id="name" value="@if(isset($teamName)){{ $teamName }}@endif">
                <input hidden class="form-control" type="text" name="type" value="change_name">
            </div>
            <div class="form-group col-6 mx-4">
                <button type="submit" class="btn btn-primary">Change Team Name</button>
            </div>
        </div>
    </form>

    <div class="container my-4">
        <h2>Projects</h2>
        @foreach ($projects as $k => $project)
        <form action="{{ route('delete') }}" method="POST">
            @csrf
            <div class="border border-primary p-2 rounded my-4">
                <h6>{{ $project['title'] }}</h6>
                <a class="d-block my-4" href="{{ $project['link'] }}">link</a>
                <div class="my-4">
                    @foreach ($project['images'] as $image)
                        <img class="border border-primary p-2 rounded" src='{{ Storage::url("public/$image") }}' alt="" width="100px" height="100px">
                    @endforeach
                </div>
                <input hidden class="form-control" type="text" name="project_id" value="{{ $k }}">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
        @endforeach
    </div>
    <form action="{{ route('settings') }}" method="POST" class="container mt-4" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input hidden class="form-control" type="text" name="type" value="add_project">
            <div class="projects col-12 mx-4">
            </div>

            <div class="form-group col-12 mx-4">
                <button type="button" id="add" class="btn btn-primary float-left">+</button>
            </div>
            <div class="form-group col-12 mx-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>

    <!-- core  -->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap 3 affix -->
	<script src="{{ asset('assets/vendors/bootstrap/bootstrap.affix.js') }}"></script>

    <!-- steller js -->
    <script src="{{ asset('assets/js/steller.js') }}"></script>
    <script>
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                var nameRandom = Math.random().toString(36).substring(7);
                var item = `
                    <div class="form-group border border-primary p-2 rounded" id="project_${nameRandom}" style="position: relative">
                        <input class="form-control m-2" type="text" name="project_${nameRandom}[title]" id="title_project_${nameRandom}" placeholder="Name">
                        <input class="form-control m-2" type="text" name="project_${nameRandom}[link]" id="link_project_${nameRandom}" placeholder="Link (nếu có)">
                        <textarea class="form-control m-2" type="text" name="project_${nameRandom}[description]" id="description_project_${nameRandom}" placeholder="Description"></textarea>
                        <div class="row m-2">
                            <label class="col-4" for="project_type_web_${nameRandom}">Web
                                <input class="" checked type="radio" name="project_${nameRandom}[cate]" id="project_type_web_${nameRandom}" value="web">
                            </label>
                            <label class="col-4" for="project_type_app_${nameRandom}">App
                                <input class="" type="radio" name="project_${nameRandom}[cate]" id="project_type_app_${nameRandom}" value="app">
                            </label>
                            <label class="col-4" for="project_type_tool_${nameRandom}">Tool
                                <input class="" type="radio" name="project_${nameRandom}[cate]" id="project_type_tool_${nameRandom}" value="tool">
                            </label>
                        </div>
                        <input class="m-2" type="file" accept="image/png, image/jpeg" name="project_${nameRandom}[images][0]">
                        <input class="m-2" type="file" accept="image/png, image/jpeg" name="project_${nameRandom}[images][1]">
                        <input class="m-2" type="file" accept="image/png, image/jpeg" name="project_${nameRandom}[images][2]">
                        <input class="m-2" type="file" accept="image/png, image/jpeg" name="project_${nameRandom}[images][3]">
                        <input class="m-2" type="file" accept="image/png, image/jpeg" name="project_${nameRandom}[images][4]">
                        <button style="position: absolute; bottom: 5px; right: 5px" type="button" data-offset="project_${nameRandom}" class="btn btn-primary sub">-</button>
                    </div>`;
                $('.projects').append(item);
            });
        });
        $(document).on('click', '.sub', function(){
            var button_id = $(this).data("offset");
            $('#'+button_id+'').remove();
        });
    </script>
</body>
</html>
