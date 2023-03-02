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

                        {{-- title --}}
                        <div class="col-sm-6 control-group mb-4">
                            <input type="text" class="form-control p-4" name="title" value="{{ old('title') }}"
                                placeholder="Title" required="required" />

                            @error('title')
                                {{-- validation --}}
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- photo --}}
                        <div class="col-sm-6 control-group mb-4">
                            <input type="file" class="form-control p-4" name="photo" placeholder="Photo"
                                required="required" />

                            @error('photo')
                                {{-- validation --}}
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- category --}}
                        <div class="control-group mb-4">
                            <label type="text" class="form-control p-4" name="category" required="required">
                                <select name="category_id">
                                    <option>Category</option>
                                @foreach ($categories as $category)
                                   <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </label>
                        </div>

                        {{-- tags --}}
                        <div class="control-group mb-4">
                            <label type="text" class="form-control p-4" required="required">
                                <select name="tags[]">
                                    <option>Tags</option>
                                @foreach ($tags as $tag)
                                   <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            </label>
                        </div>

                    {{-- short_content --}}
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" name="short_content"
                            value="{{ old('short_content') }}" placeholder="Short_content" required="required" />

                        @error('short_content')
                            {{-- validation --}}
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- content --}}
                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" name="content" placeholder="Content" required="required">{{ old('content') }}</textarea>

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
