<x-layouts.header>

    <x-slot:title>
        Notifications
    </x-slot:title>

    <x-page-header>
        Notifications
    </x-page-header>

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Notifications</h6>
                    <h1 class="section-title mb-3">Notifications</h1>
                </div>
                {{-- <div class="col-lg-6">
                    <h4 class="font-weight-normal text-muted mb-3">Eirmod kasd duo eos et magna, diam dolore stet sea
                        clita sit ea erat lorem. Ipsum eos ipsum magna lorem stet</h4>
                </div> --}}
            </div>

            @foreach ($notifications as $notification)
                <div class="border mb-3 p-4 rounded">
                    <div class="position-relative mb-4">

                        @if ($notification->read_at == null)
                            <div class="blog-date">
                                <h5 class="font-weight-bold mb-n1">new</h5>
                            </div>
                        @endif

                    </div>
                    <div class="d-flex mb-2">
                        <a class="text-secondary text-uppercase font-weight-medium">{{ $notification->created_at }}</a>
                    </div>
                    <h5 class="font-weight-medium mb-2">{{ $notification->data['title'] }}</h5>
                    <p class="mb-4">{{ 'Yangi post yaratildi. id: ' . $notification->data['id'] }}</p>

                    @if ($notification->read_at == null)
                        <a class="btn btn-sm btn-primary py-2"
                            href="{{ route('notifications.read', ['notification' => $notification->id]) }}">Viewed</a>
                    @endif

                </div>
            @endforeach

            {{ $notifications->links() }}

            {{-- <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>

                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> --}}
        </div>
    </div>
    <!-- Blog End -->

</x-layouts.header>
