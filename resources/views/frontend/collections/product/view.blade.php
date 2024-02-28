@extends('layouts.app')
@section('content')

<livewire:frontend.product.view : categories="$categories" :products="$products">
   


@endsection