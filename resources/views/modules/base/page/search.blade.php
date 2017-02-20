@extends('layouts.app')
@section('content')
    <page-{{ $pageInfo->module }}-{{ $pageInfo->page  }} :page-id="{{ $pageInfo->id }}"></page-{{ $pageInfo->module }}-{{ $pageInfo->page  }}>
@stop