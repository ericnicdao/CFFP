<style>
    html {
        scroll-behavior: smooth;
    }

	*{
		padding: 0px;
		margin:0px;
		box-sizing: border-box;
	}

	.box{
		width: 100%;
		height: 600px;
		padding: 40px 60px;
		color: white;
		font-family: sans-serif;
		text-align: center;
	}

    .boxcontent{
		width: 100%;
		padding: 40px 60px;
		color: white;
		font-family: sans-serif;
		text-align: center;
	}

	.section-1{
          height: 100vh;
          background-image: url("assets/img/wp1.jpg");
          background-attachment: fixed;
          background-size: cover;
	}

	.section-2{
        background: #bfac00;
	}

	.section-3{
		background-image: url("assets/img/wp2.jpg");
        background-attachment: fixed;
        background-size: cover;
	}

	.section-4{
		background: #a11e15;
	}

    .section-5{
		background-image: url("assets/img/wp3.jpg");
        background-attachment: fixed;
        background-size: cover;
	}

	.boxcontent p{
		font-size: 20px;
		margin-top: 100px;
	}

	.boxcontent h1{
		font-size: 50px;
		text-shadow:  0px 0px 5px #000;
	}
</style>

@extends('layouts.app')

@section('content')

<div class="section-1 box">
</div>

<div id='who' class="section-2 boxcontent">

	<h1>Who we are?</h1>

	<p>
        Once the humble family vegetable garden, Cruz Farm Fresh Produce is today a backyard working farm with over 30 
        varieties of vegetables. When Ashley Cruz was laid off from his corporate position three years ago, she first 
        turned to the vegetable garden for money saving / economic reasons. But with the uncertainty of recent events 
        in the Middle East, the energy crisis, the long term effects of reliance on fossil fuels, and his personal 
        philosophies on conservation, Ashley Cruz and his husband, turned this family vegetable patch into a thriving 
        certified organic produce business.
	</p>

</div>

<div class="section-3 box">
</div>

<div id='contact' class="section-4 boxcontent">
	
	<h1>Reach out to us</h1>

	<p>
        Tel: 871-XX-XX<br />
        Mobile: 0999-XXX-XXXX<br />
		Email: info@cffp.com
	</p>

</div>

<div class="section-5 box">
</div>

<div class="section-2 box">

	<h1>Some more info</h1>

	<p>
		
	</p>

</div>
@endsection