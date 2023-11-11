@extends('user.layout.app')
@section('content')
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Pembayaran</h1>
        </div>
    </div>
    <div class="container my-5">

        @if(session()->has('message'))
            <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert" id="alert-message">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">{{ __('Upload bukti pembayaran') }}</h1>
                            @if(isset($member))
                                <span class="badge badge-info">Batas Pembayaran {{ \Carbon\Carbon::parse($member->total_biaya)->format('j F, Y, H:i:s') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="total_harga">{{ __('Harga') }}</label>
                        <select name="total_harga" id="total_harga" class="form-control">
                            @if(isset($member))
                            @foreach($member as $member)
                                @php
                                    $total_biaya = $member->total_biaya;
                                @endphp

                                <h2 value=" Total Harga: {{ $total_biaya }}</h2>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="card-body">
                        <h3 class="h6 mb-0 text-black-400"><br>{{ __('No rek : 1234567') }}</h3>
                        <br>
                        <a href=" https://api.whatsapp.com/send?phone=6281234567090&text=Nama,nomer lapangan berikut bukti pembayaran" class="btn btn-success btn-block">{{ __('Kirim bukti perbayaran') }}</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@endsection
