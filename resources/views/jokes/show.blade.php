@extends('layouts.app')

@section('sidebar')
<div class="sidebar-top">
            <img src="{{asset('images/premium-content-library.png')}}" style="margin-top:7px;">
            <a href="/"><h1 class="topic-back"><i class="fas fa-chevron-left"></i> Topics</h1></a>
</div>
@endsection('sidebar')

@section('header')
  <a class="back" href="/"><button size="medium" class="back-button top-button">BACK</button></a>
  <el-button size="medium" class="top-button exit-button" onclick="parent.window.close()">EXIT CONTENT LIBRARY</el-button>
@endsection

@section('content')
<div class="tab-content">

  <!-- jokes -->
  <div class="tab-pane active jokes" id="jokes" role="tabpanel" >
    @foreach($jokes as $joke)
    <div class="joke card" style="margin-bottom: 1%;">
      <div class="joke-wrapper">
          <p class="joke-excerpt">{{ $joke->excerpt }}</p>
          <div class="joke-content">
            {!! $joke->joke !!}
          </div>
          <div class="read-more">Read More</div>
      </div>
      <div class="related-topics">
        <div class="copy-action" onclick="copyToClipboard('copy')" style="float: left;">Copy joke<i class="fas fa-plus"></i></div>
      </div>
    </div>
    @endforeach
  </div>

</div>

@endsection('content')
