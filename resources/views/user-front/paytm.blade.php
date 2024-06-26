@extends('user-front.layout')

@section('content')
    <center>
        <h1>Please do not refresh this page...</h1>
    </center>
    <form method="post" action="{{ $paytm_txn_url }}" name="f1">
        {{ csrf_field() }}
        <table border="1">
            <tbody>
                @foreach ($paramList as $name => $value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
                <input type="hidden" name="CHECKSUMHASH" value="{{ $checkSum }}">
            </tbody>
        </table>

    </form>
@endsection

@section('script')
    <script type="text/javascript">
        document.f1.submit();
    </script>
@endsection
