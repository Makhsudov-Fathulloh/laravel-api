<x-layouts.header>

    <x-slot:title>
        Add POST
    </x-slot:title>

    <x-page-header>
        Add new Post
    </x-page-header>

    <div class="row d-flex justify-content-center">

        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="contact-form">
                <div id="success"></div>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-6 control-group mb-4">
                            <input type="text" class="form-control p-4" name="title" value="{{ old('title') }}"
                                placeholder="Title" required="required" />

                            @error('title')
                                {{-- validation --}}
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-sm-6 control-group mb-4">
                            <input type="file" class="form-control p-4" name="photo" placeholder="Photo"
                                required="required" />

                            @error('photo')
                                {{-- validation --}}
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" name="short_content"
                            value="{{ old('short_content') }}" placeholder="short_content" required="required" />

                        @error('short_content')
                            {{-- validation --}}
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" name="content" placeholder="content" required="required">{{ old('content') }}</textarea>

                        @error('content')
                            {{-- validation --}}
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-layouts.header>
