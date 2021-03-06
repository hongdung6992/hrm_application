@extends('admin.layouts.page')
@section('content')
<section class="content mt-5 p-5">
  <div class="error-page">
    <h2 class="headline text-warning">401</h2>
    <div class="error-content">
      <h3><i class="fas fa-exclamation-triangle text-warning"></i> {{ t('401.header') }}</h3>
      <p>{{ t('401.body') }}</p>
      <a href={{ route('login') }} class="btn btn-primary">{{ t('401.footer') }}</a>
    </div>
  </div>
</section>
@endsection
