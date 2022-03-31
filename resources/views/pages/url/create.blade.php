@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('url'))
                    <div class="alert alert-success">
                        Your short url: <a id="hash-link" target="_blank" href="{{ session()->get('url') ?? '#' }}">{{ session()->get('url') ?? '#' }}</a>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('url.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="long_url" class="col-md-4 col-form-label text-md-end">{{ __('Long Url') }}</label>

                                <div class="col-md-6">
                                    <input id="long_url" type="text" class="form-control @error('long_url') is-invalid @enderror" name="long_url" value="{{ old('long_url') }}" required autocomplete="long_url" autofocus placeholder="Type long url">

                                    @error('long_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Shorten Url') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
