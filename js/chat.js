var scroll = true;
var chatc = "../actions/chat.php"; //путь к action чата



function mod(num){
				$.ajax({
					url: chatc,
					type: "POST",
					data: {
					moder: num, 
					},
					dataType: "html",
					success: function(response){
					 obj = $.parseJSON(response);
				toastr['success']('Пользователь назначен модератором')	 	 
					}	   
			 
				 })};    
function noblockUsers(num){
				$.ajax({
					url: chatc,
					type: "POST",
					data: {
					no_chat_ban: num, 
					},
					dataType: "html",
					success: function(response){
					 obj = $.parseJSON(response);
				toastr['success']('Пользователь разблокирован')	 	
					}	   
			 
				 })};    
function blockUsers(num){
			$.ajax({
				url: chatc,
				type: "POST",
				data: {
				chat_ban: num, 
				},
				dataType: "html",
				success: function(response){
				 obj = $.parseJSON(response);
			toastr['success']('Пользователь заблокирован')	 
				}	   
		 
			 })};
function delMess(num){
       $.ajax({
		   url: chatc,
		   type: "POST",
		   data: {
			del:num, 
		   },
		   dataType: "html",
		   success: function(response){
			obj = $.parseJSON(response);
		toastr['success']('Сообщение удалено')		
		   }	   
	
		})};

function addChat(num){
 mess = $('#inputChat1').val();

       if ($('#inputChat1').val() == '') {
       toastr['error']('Введите сообщение')
        }
 
    if(mess.length >= "1"){
    $.ajax({
        type: 'POST',
        url: chatc,
        data: {
            mess: mess,
        },
        success: function(response) {
               obj = $.parseJSON(response);
               $(".chat-send").attr("disabled","disabled");

               setTimeout(
                 function(){
                  $(".chat-send").removeAttr("disabled","disabled");
                 },5000);
$('#inputChat1').val('');
getDisplayChat();
                if(obj.good == "false") {
                toastr['error'](obj.mess)
                }
                else {
                 toastr['success'](obj.mess)
                }    
              
              
            
        }
    });

}
}
function getDisplayChat(){
  $.ajax({
    url: chatc,
    dataType: "html",
    type: "POST",
    data: {
      chatGet: "ok",
    },
    success: function(response){
      obj =  $.parseJSON(response);
      $(".chat-main").html(obj.chat);
      $('.chat-main').html(obj.allmess); //.
      $('.chat-main').stop().animate({
            scrollTop: $('.chat-main')[0].scrollHeight
        }, 800);
    }
  });
};