$(document).ready(function() {
	$(".box .toggle").bind('click', function(){boxToggle(this);return false;});
	$(".remove-btn").bind('click', function(event){ackAlert(this,event);return false;});
        $(".ack-alert").bind('click', function(event){ackAlert(this,event);return false;});
        //$('.selectpicker').selectpicker({width:'100%'});
});

function boxToggle(that) {
	content_box = $(that).parent().find(".box-content");
	box = $(content_box).parent();
	if($(content_box).css("display") == "none") {
		$(content_box).slideDown(200, function(){
			$(box).removeClass("closed").addClass("open");
		});
	}
	else {
		$(content_box).slideUp(200, function(){
			$(box).removeClass("open").addClass("closed");
		});
	}
}

function messageRemove(that) {
	$(that).parent().parent().fadeOut(200);
}

function ackAlert(that,e) {
        e.preventDefault()
        var alerturl = $(that).attr('href');
        $.ajax({
                type: "GET",
                url: alerturl,
                data: ""
        });
        messageRemove(that);
        
}