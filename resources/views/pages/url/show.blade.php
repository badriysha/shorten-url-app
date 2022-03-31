@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Url Details</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Long Url</td>
                                <td>{{ $url->long_url }}</td>
                            </tr>
                            <tr>
                                <td>Short Url</td>
                                <td>{{ url($url->code) }}</td>
                            </tr>
                            <tr>
                                <td>Created At</td>
                                <td>{{ $url->created_at }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4 class="mt-5">Visitors</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <td>IP</td>
                                <td>OS</td>
                                <td>Browser</td>
                                <td>Device</td>
                                <td>Visited At</td>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($visitors as $visitor)
                                <tr>
                                    <td>{{ $visitor->visitor_ip }}</td>
                                    <td>{{ $visitor->visitor_os }}</td>
                                    <td>{{ $visitor->visitor_browser }}</td>
                                    <td>{{ $visitor->visitor_device }}</td>
                                    <td>{{ $visitor->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No visitor data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
