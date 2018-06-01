<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat Room</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style type="text/css">
		.list-group{
			overflow-y: scroll;
			height: 500px;
		}
	</style>
</head>
<body>

    <dir class="container">
    	<dir class="row" id="app">
    		<dir class="center col-md-4">
    		    <li class="list-group-item active">Chat Room</li>	
    		    <ul class="list-group"  v-chat-scroll>
                    
                    <message v-for="value in chat.message" :key=value.index color='alert-success'>   
                    		@{{ value }}     
                    </message>
       
                </ul>
                <input type="text" class="form-control" placeholder="Type your message here..." v-model='message' @keyup.enter='send'>
    		</dir>
    	</dir>
    </dir>


    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>

