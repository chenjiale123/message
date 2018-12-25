$(function(){
	$(".chat").each(function(index,el){
		var $this = this;
		var timeout;
		el.ontouchstart = function(e){
			e.stopPropagation();
			timeout = setTimeout(function(){
				$(".chat .long").remove();
				var press = `
					<div class="bg-white long position-absolute text-center">
						<div class="nosele h-30 mt-3">
							取消选择
						</div>
						<div class=" h-30 react">
							置顶聊天
						</div>
						<div class="delete h-30"> 
							删除该聊天
						</div>
					</div>
				`;
				$($this).append(press);
				$(".long .nosele").click(function(e){				
					setTimeout(function(){
						clearTimeout(timeout);
						$(".long").remove();
					},200);
					e.stopPropagation();
				});
				$(".long .react").click(function(e){				
					setTimeout(function(){
						clearTimeout(timeout);
						$(el).prependTo($(".chatList"));
						$(".long").remove();
					},200);
					e.stopPropagation();
				});
				$(".long .delete").click(function(e){				
					setTimeout(function(){
						$(el).remove();
					},200);
					e.stopPropagation();
				});
			},800);		
		}
	});
});