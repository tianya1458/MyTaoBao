$(function(){
	
	
	/*搜索框*/
	(function(){
	    var num=0;
	   	var arrText = [
			'超市的薯片半价啦！'
		];
		$('.menu li').on('click',function(){
			num=$(this).index()
			$('.menu li').removeClass('active');
			$('.menu li').eq(num).addClass('active');
			$('#search .inp').val(arrText[num]);
		})
		$('#search .inp').focus(function(){
			console.log(1);
			if($(this).val()==arrText[num]){
				$(this).val('')
			}
		})
		$('#search .inp').blur(function(){
			if($(this).val()==''){
				$(this).val(arrText[num])
			}
		})
		
		
	})();
	/*搜索框下的广告*/
	(function(){
		var h=$('.ad li').height();
		var num=0;
		var tp=''
		$(' .ad .up').on('click',function(){
			num++;
			if(num==$('.ad li').length-1){
				num=0;
			}
			tp=-num*h+'px'
			$('.ad ul').stop().animate({top:tp})
			console.log(tp);
		})
		
		$('.ad .down').on('click',function(){
			num--;
			if(num==-1){
				num=$('.ad li').length-1;
			}
			tp=-num*h+'px'
			$('.ad ul').stop().animate({top:tp})
			console.log(tp);
		})
	})();
	
	/*日历*/
	(function(){
		
		$('.date ul li ').has('img').hover(function(){
			$('.date .floatBox').css('display','block');
			var Left=$(this).position().left+48+'px';
			var Right=$(this).position().right+'px';
			var Htm=$('.date p span').eq($(this).index()%7).html();
			var Src=$(this).children().attr('src')
			$('.date .floatBox').css('left',Left).css('right',Right)
			
			$('.date .floatBox em').html(Htm)
			$('.date .floatBox img').attr('src',Src)
		},function(){
			$('.date .floatBox').css('display','none');
		})
	
	})();
 
	/*精彩推荐*/
	(function(){
		var arr = [ '爸爸去哪儿啦~', '人像摄影中的光影感', '娇柔妩媚、美艳大方' ];
		var num=0;
		var i='';
		var timer='';
		$('.advice .img ul li').eq(0).fadeIn().css('z-index','2');
		
		$('.advice .img').hover(function(){clearInterval(timer)},function(){toRun()})
		
		
		$('.advice .img ol li').on('click',function(){
			
			num=$(this).index();
			
			play();
		})
		toRun();
		function toRun(){
			timer=setInterval(function(){
				num++;
				if(num>arr.length-1){
					num=0;
				}
				play();
				
			},2000)
		}
		function play(){
			$('.advice .img ol li').removeClass('active');
			$('.advice .img ol li').eq(num).addClass('active');
			for (var i=0;i<arr.length;i++) {
				if(i==num){
			    	$('.advice .img ul li').eq(i).fadeIn().css('z-index','2');
			    	$('.advice .img p').html(arr[num]);
			    }else{
			    	$('.advice .img ul li').eq(i).fadeOut().css('z-index','1');
			    }
			}
		}
		
	})();
	
	/*选项卡*/
	
	(function(){
		
		fab($('.hot ul li '),$('.hot a '),$('.hot ol '))
		fab($('.subway li '),$('.subway a '),$('.subway img '))
		fab($('.know li '),$('.know .wrap1 ul a '),$('.know ol '))
		fab($('.coupons li '),$('.coupons .wrap2 ol a '),$('.coupons ul '))
		function fab(tabBtn,tabtrg,tabList){
			var num=0;
		    tabBtn.on('click',function(){
		      	tabBtn.removeClass('active');
		      	tabtrg.removeClass('triangle_down_red').addClass('triangle_down_gray');
		      	tabList.css('display','none')
		      	num=$(this).index();
		      	tabBtn.eq(num).addClass('active')
		      	tabtrg.eq(num).removeClass('triangle_down_gray').addClass('triangle_down_red')
		      	tabList.eq(num).css('display','block')
		      })
	   }
	})();
	
	
	
})