<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include('includes.head')
<body class="bg-light">
  <div id="app" class="app-wrap">
    <el-container>
        <div class="welcome-message">
          <div class="inner-message">
            <p class="inner-message-text">
              Welcome to Oratium Premium Content. This library contains a unique collection of compelling quotes, illustrative stories, and visuals which you can use to powerfully land the critical ideas in your presentation. This library has been organized by topics which are most commonly used in business presentations. We suggest you start by looking for the topic you’re looking to illustrate – follow your nose until you find something that works.
            </p>
            <p class="inner-message-text">
                Browse and enjoy,<br>
                The Oratium Team
            </p>
            <div style="position: absolute; bottom: -15px; width: 60vw;">
              <div style="text-align: center;">
                <button id="close-message">CONTINUE</button>
              </div>
            </div>
          </div>
        </div>
      <el-aside>
        @yield('sidebar')
      </el-aside>
      <el-container>
        <el-header>
          @yield('header')
        </el-header>
        <el-main>
          @yield('content')
        </el-main>
      </el-container>
    </el-container>
  <!-- Scripts -->
  </div>

<script src="{{ mix('/js/app.js') }}"></script>
<script>
// ajax query function
$(document).ready(function(){
 fetch_topic_data();
 function fetch_topic_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('.topics').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_topic_data(query);
  console.log(query);
 });

 $(document).on('click', '#clear-query', function(){
  var query = $(this).val();
  fetch_topic_data(query);
  $('#search').attr('value', '');
  $('#search').val('');
  console.log(query);
 });


 order_topic_data();
 function order_topic_data(order = 'asc')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{order:order},
   dataType:'json',
   success:function(data)
   {
    $('.topics').html(data.table_data);
    console.log('im being ordered');
   }
  })
 }

 $('#order').change(function(){
  var order = $('#order option:selected').val();
  order_topic_data(order);
  console.log(order);
 });
});
</script>
<script src="{{ asset('/js/project.js') }}"></script>
</body>
</html>
