@extends('master')

@section('content')


        <div class="container-fluid">
        eDominations
        </div>
<?php
use App\Http\Helpers\Endpointsv2;


$getsomething = new Endpointsv2(18717);
var_dump($getsomething->getBattles());

?>
@endsection

@section('footer')
   hello
@endsection
