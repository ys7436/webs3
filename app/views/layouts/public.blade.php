@extends('layouts.master')
@section('wapper')
<div class="bg_f7">
    <div class="wd">
        <div class="content clr">
            <div class="cont_left fl">
                <div class="item_tit">
                	{{$pid_catname}}
                    <span>{{$pid_catname2}}</span>
                </div>
                <div class="item_list">
                	<ul>
                    	{!! erji_nav($pid) !!}
                    </ul>
                </div>
            </div>

            <div class="cont_right fr">
            	<div class="cont_right_tit">
                	<p>{{$ty_catname}}<span>/{{$ty_catname2}}</span></p>
                </div>

                @yield('right')
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/js.js"></script>
@stop