@extends('layouts.app')
@section('title', 'Premium Content Library')
@section('sidebar')
<div class="home-sidebar">
            <img class="logo" src="{{asset('images/premium-content-library.png')}}">
            <h1 h1 class="topic-header"><i class="far fa-comment-alt"></i>Topics</h1>
    <div class="most-popular">
            <h5>Most Popular</h5>
            @foreach ($topicViews as $topic)
                <a href="{{ '/topics/' . $topic->slug }}" class="">
                  <p>{{ $topic->topic }}<span class="resource">{{ $topic->articles->count() + $topic->lifts->count() + $topic->quotes->count() + $topic->visuals->count() }}</span></p></a>
            @endforeach
    </div>
    <div class="more-sources">
      <h5>More Sources</h5>
        <a href="/jokes" class="more-sources-button">Jokes</a>
    </div>
</div>
@endsection('sidebar')
@section('header')
  <div class="form-group" style="width: 100%; float: left">
    <select name="order" placeholder="Search Topics" id="order" >
      <option disabled selected>Sort Topics</option>
      <option value="view">Popularity</option>
      <option value="asc">A-Z</option>
      <option value="desc">Z-A</option>
    </select>
   <input type="text" name="search" id="search" class="form-control" placeholder="Filter Topics..." />
   <el-button size="medium" class="topic-top-button exit-button" onclick="parent.window.close()">EXIT CONTENT LIBRARY</el-button>
  </div>
@endsection

@section('content')
      <!-- <button id="delCookie">DELETE COOKIE</button> -->
  <div class="table-responsive">
    <div class="topics">
    </div>
  </div>
@endsection
