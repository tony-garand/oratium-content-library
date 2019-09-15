@extends('layouts.app')

@section('title', $topics->topic)

@section('sidebar')
<div class="sidebar-top">
            <img src="{{asset('images/premium-content-library.png')}}" style="margin-top:7px;">
            <h1 class="topic-back">Topic:</h1>
            <h2 class="selected-topic">{{ $topics->topic }}</h2>
</div>
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#lifts" role="tab"><i class="far fa-file-alt"></i>Illustrative<br><span style="margin-left: 25px;">Stories</span><span style="margin-top: -20px;" class="nav-number">{{ $topics->lifts->count() }}</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#quotes" role="tab"><i class="fas fa-quote-right"></i>Quotes <span class="nav-number">{{ $topics->quotes->count() }}</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#visuals" role="tab"><i class="far fa-images"></i>Visuals <span class="nav-number">{{ $topics->visuals->count() }}</span></a>
              </li>
              <li class="nav-item" style="margin-top: 60px;">
                <a class="nav-link" data-toggle="tab" href="#articles" role="tab"><i class="far fa-newspaper"></i>Articles <span class="nav-number">{{ $topics->articles->count() }}</span></a>
              </li>
            </ul>
            <div class="more-sources view">
              <h5>More Sources</h5>
                <a href="/jokes" class="more-sources-button">Jokes</a>
            </div>
@endsection('sidebar')

@section('header')
  <a class="back" href="/"><button size="medium" class="back-button top-button">BACK</button></a>
  <el-button size="medium" class="top-button exit-button" onclick="parent.window.close()">EXIT CONTENT LIBRARY</el-button>
@endsection

@section('content')
<div class="tab-content">


  <!-- Lifts -->
  <div class="tab-pane active lifts" id="lifts" role="tabpanel" >
    @foreach($topics->lifts as $lift)
    <div class="lift card">
      <div class="lift-wrapper">
        <div class="lift-insight">
          <h3 class="insight-title">Insight</h3>
          {!! $lift->insight !!}
        </div>
        <div class="copy-action" onclick="copyToClipboard('copy')">Copy Lift<i class="fas fa-plus"></i></div>
          <h3 class="lift-title">{{ $lift->title }}</h3>
          <p class="lift-excerpt">{{ $lift->excerpt }}</p>
          <div class="lift-content">
            <p class="hidden-title" style="display:none;">Insight
            </p>
            <p class="hidden-title" style="display:none;">{!! $lift->insight !!}
              <br>
            </p>
            <p class="hidden-title" style="display:none;">
              {!! $lift->title !!}
              <br>
            </p>
            {!! $lift->lift !!}
          </div>
          <div class="read-more">Read More</div>
      </div>
      <div class="related-topics">
          <h5>Related Topics</h5>
        @foreach($lift->topics as $relatedTopic)
          <a href="{{ '/topics/' . $relatedTopic->slug }}" class=""><p>{{ $relatedTopic->topic }}
            <span class="resource">{{ $relatedTopic->articles->count() + $relatedTopic->lifts->count() + $relatedTopic->quotes->count() + $relatedTopic->visuals->count() }}</span>
          </p></a>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>

  <!-- Quotes -->
  <div class="tab-pane quotes" id="quotes" role="tabpanel">
    @foreach($topics->quotes as $quote)
    <div class="quote card">
      <div class="quote-wrapper">
        <div class="quote-inner">
          <p class="quote-content">
            {{ $quote->quote }}
          </p>
          <h4 class="quote-author">{{ $quote->author }}</h4>
          <div class="quote-copy-action" onclick="copyToClipboard('copy')"><i class="fas fa-plus"></i></div>
        </div>
        <div class="previous"><i class="material-icons">arrow_back</i></div>
        <div class="next"><i class="material-icons">arrow_forward</i></div>
      </div>
        <div class="related-topics">
          <h5>Related Topics</h5>
          @foreach($quote->topics as $relatedTopic)
            <a href="{{ '/topics/' . $relatedTopic->slug }}" class=""><p>{{ $relatedTopic->topic }}
              <span class="resource">{{ $relatedTopic->articles->count() + $relatedTopic->lifts->count() + $relatedTopic->quotes->count() + $relatedTopic->visuals->count() }}</span>
            </p></a>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <!-- Visual -->
  <div lass="tab-pane visuals" id="visuals" role="tabpanel">
    @foreach($topics->visuals as $visual)
    <div class="visual card">
      <div class="visual-wrapper">
        <div class="image" style="background-image: url(/images/{{ $visual->image }});"></div>
        <div class="previous"><i class="material-icons">arrow_back</i></div>
        <div class="next"><i class="material-icons">arrow_forward</i></div>
        @if(empty($visual->description))
        @else
        <div class="visual-description">
          <h3 class="visual-description-text">{{ $visual->description }}</h3>
        </div>
        @endif

        <div class="visual-disclaimer">
          <h3 class="visual-disclaimer-text"><i class="material-icons" style="font-size:12px; padding: 0 10px;">info</i><span style="margin-top: -2px;">This illustration is only an example. Remember: you need to only use images for which you have permission.<span></h3>
        </div>
      </div>
      <div class="related-topics">
        <h5>Related Topics</h5>
        @foreach($visual->topics as $relatedTopic)
        <a href="{{ '/topics/' . $relatedTopic->slug }}" class=""><p>{{ $relatedTopic->topic }}
          <span class="resource">{{ $relatedTopic->articles->count() + $relatedTopic->lifts->count() + $relatedTopic->quotes->count() + $relatedTopic->visuals->count() }}</span>
        </p></a>
        @endforeach
      </div>
    </div>
    @endforeach
  </div>

  <!-- Articles -->
  <div class="tab-pane articles" id="articles" role="tabpanel">
  @foreach($topics->articles as $article)
      <div class="article card">
        <div class="article-wrapper">
          <h3 class="article-title">{{ $article->title }}</h3>
          <div class="copy-action" onclick="copyToClipboard('copy')">Copy Article<i class="fas fa-plus"></i></div>
          <p class="article-excerpt">{{ $article->excerpt }}</p>
          <div class="article-content">
            <div style="display:none;">
              {!! $article->title !!}
              <br>
            </div>
           {!! $article->article !!}
         </div>
          <div class="read-more">Read More</div>
        </div>
        <div class="related-topics">
          <h5>Related Topics</h5>
          @foreach($article->topics as $relatedTopic)
          <a href="{{ '/topics/' . $relatedTopic->slug }}" class="">
            <p>{{ $relatedTopic->topic }}
            <span class="resource">{{ $relatedTopic->articles->count() + $relatedTopic->lifts->count() + $relatedTopic->quotes->count() + $relatedTopic->visuals->count() }}</span>
            </p></a>
          @endforeach
        </div>
      </div>
  @endforeach
  </div>

</div>

@endsection('content')
