@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">All Urls</div>
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td>Long Url</td>
                                <td>Short Url</td>
                                <td>User</td>
                                <td>Created At</td>
                                <td>Action</td>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($urls as $url)
                                <tr>
                                    <td>{{ $url->long_url }}</td>
                                    <td><a href="{{ url($url->code) }}" target="_blank">{{ url($url->code) }}</a></td>
                                    <td>{{ $url->user->name ?? '-' }}</td>
                                    <td>{{ $url->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ url("links/{$url->id}") }}">Show</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No url data!</td>
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
