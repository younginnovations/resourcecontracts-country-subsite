<?php
use \Illuminate\Support\Facades\Lang as Lang;

?>
@extends('layout.app-full')

@section('css')
    @if(!empty($image))
        <style>
            .row-top-wrap {
                background-image: url({{$image}});
            }
        </style>
    @endif
@stop
@section('content')
    <div class="row row-top-wrap front-row-top-wrap">
        <div class="homepage-wrapper">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <span data-toggle="collapse-sidebar" data-target=".sidebar-collapse"
                          data-target-2=".sidebar-collapse-container" class="pull-left trigger">trigger</span>

                    <a class="navbar-brand" href="{{url()}}"><span class="country-flag"><img src="{{getFlagUrl()}}{{env('COUNTRY')}}.png"/></span>{{ $countryName }}<span>Resource Contracts</span></a>


                </div>
            </nav>

            <div class="col-lg-8 col-md-9">

                <div class="row row-top-content">
                    <div class="tagline">

                        @lang('global.a_directory_of') <span>Resource Contracts from {{$countryName}}</span>

                    </div>
                    <form action="{{route('search')}}" method="GET" class="contract-search-form">
                        <div class="form-group">
                            <input type="text" name="q" class="form-control pull-left"
                                   placeholder="@lang('global.search') {{$contracts}} {{ Lang::choice('global.contracts' , $contracts) }} @if(env('CATEGORY') != 'olc') @lang('global.associated_documents') @endif">
                            <button type="submit"
                                    class="btn btn-search">@lang('global.search')</button>
                        </div>
                        <span class="advanced-search">Advanced Search</span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-content">
        <div class="col-sm-6 col-md-6 col-lg-6 country-wrapper">
            <div class="country-wrap">
                <div class="country-inner-wrap">
                    <p>@lang('global.contract_doc_from')</p>
                    <span>@lang('country.'.@strtoupper(env('COUNTRY')))</span>
                </div>
                <a href="#" class="btn btn-view">@lang('global.view_all_countries')</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 resource-wrapper">
            <div class="resource-wrap">
                <div class="resource-inner-wrap">
                    <p>@lang('global.contracts_related_to')</p>
                    <span>{{$resources or ''}}</span> @lang('global.resources')
                </div>
                <a href="{{route('resources')}}" class="btn btn-view">@lang('global.view_all_resources')</a>
            </div>
        </div>
    </div>
@stop