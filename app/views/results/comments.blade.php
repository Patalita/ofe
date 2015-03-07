
<script type="text/javascript" src=<?php echo asset("js/jquery-1.11.2.js")?>></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//how much items per page to show
	var show_per_page = 5; 
	//getting the amount of elements inside content div
	var number_of_items = $('#comments').children().size();
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	
	//set the value of our hidden input fields
	$('#current_page').val(0);
	$('#show_per_page').val(show_per_page);
	
	//now when we got all we need for the navigation let's make it '
	
	/* 
	what are we going to have in the navigation?
		- link to previous page
		- links to specific pages
		- link to next page
	*/
	var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';
	var current_link = 0;
	while(number_of_pages > current_link){
		navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';
		current_link++;
	}
	navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';
	
	$('#page_navigation').html(navigation_html);
	
	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');
	
	//hide all the elements inside comments div
	$('#comments').children().css('display', 'none');
	
	//and show the first n (show_per_page) elements
	$('#comments').children().slice(0, show_per_page).css('display', 'block');
	
});

function previous(){
	
	new_page = parseInt($('#current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}
	
}

function next(){
	new_page = parseInt($('#current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}
	
}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('#show_per_page').val());
	
	//get the element number where to start the slice from
	start_from = page_num * show_per_page;
	
	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	
	//hide all children elements of comments div, get specific items and show them
	$('#comments').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
	
	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
	
	//update the current page input field
	$('#current_page').val(page_num);
}
  
</script>
<style>
#page_navigation a{
	padding:3px;	
	margin:2px;
	color:#a0a0a0;
	text-decoration:none;
	font-size: 9.5pt;
	box-shadow: 
        0 0 1px rgba(0, 0, 0, 0.3), 
        0 3px 7px rgba(0, 0, 0, 0.3), 
        inset 0 1px rgba(255,255,255,1),
        inset 0 -3px 2px rgba(0,0,0,0.25);
    border-radius: .5px;
}
.active_page{
	background:#52cfeb;
	color:white !important;
}
p {

 border-bottom: 1px solid rgba(0, 0, 0, 0.1);
 box-shadow: 1px 0 0 rgba(255, 255, 255, 0.7);
 padding: 0 0 20px 0;
}
</style>

@extends('layouts.inssublist')
@section('content')
	<!-- the input fields that will hold the variables we will use -->
	<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />
	
	<!-- Content div. The child elements will be used for paginating(they don't have to be all the same,
		you can use divs, paragraphs, spans, or whatever you like mixed together). '-->
	<table id='tblsurvey'>
	<tr><th align="center">Subject:&nbsp;&nbsp;{{ Session::get($data['subj'][0])}}</th></th>
	<tr><td><b>Student Comments:</b></td></tr>
    <tr><td>	
	<div id='comments'>		
		@foreach($data['com'] as $d)
		<p>{{ $d}}</p>
	  @endforeach

	</div>
   </td></tr>
   <tr><th><center><div id='page_navigation'></div></center></th></tr>
   </table><br><br>
	<!-- An empty div which will be populated using jQuery -->
	
{{ HTML::linkRoute('showSubjects','<<',array('class'=>'back')) }}		
</br>
@endsection