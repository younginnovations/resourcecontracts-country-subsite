<?php
$countryName = trans('country.' . strtoupper(env('COUNTRY')));
?>
<div class="row">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <span data-toggle="collapse-sidebar" data-target=".sidebar-collapse" data-target-2=".sidebar-collapse-container" class="pull-left trigger">trigger</span>

            <a class="navbar-brand" href="{{url()}}"><span class="country-flag"><img src="{{get_country('flag')}}"/></span>{{ $countryName }}<span>Resource Contracts</span></a>

        </div>
        <div class="col-sm-12 col-md-9 col-lg-10 navbar-right">
            @if(!isset($show_advance))
                @include('layout.partials.search')
            @endif
        </div>
    </nav>
</div>
