<x-layouts.header>

    <x-slot:title>
        Edit POST #{{ $post->id }}
    </x-slot:title>

    <x-page-header>
        Edit POST #{{ $post->id }}
    </x-page-header>

    <div class="row d-flex justify-content-center">

        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="contact-form">
                <div id="success"></div>

                <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="col-sm-6 control-group mb-4">
                            <input type="text" class="form-control p-4" name="title" value="{{ $post->title }}"
                                placeholder="Title" required="required" />

                            @error('title')
                                {{-- validation --}}
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-sm-6 control-group mb-4">
                            <input type="file" class="form-control p-4" name="photo" id="subject"
                                placeholder="Photo" required="required" />

                            @error('photo')
                                {{-- validation --}}
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="3" name="short_content" placeholder="short_content"
                        required="required">{{ $post->short_content }}</textarea>

                        @error('short_content')
                            {{-- validation --}}
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="6" name="content" placeholder="content"
                        required="required">{{ $post->content }}</textarea>

                        @error('content')
                            {{-- validation --}}
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success py-3 px-5" type="submit">Save</button>
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary py-3 px-5"
                            type="submit">Close</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-layouts.header>
