$(function() {
    //底部返回
    $(window).scroll(function() {
        h = $(window).scrollTop();
        if(h > 400) {
            $('.topback').show();
            $('.floor').addClass('floorshow');
        }
        if(h < 400) {
            $('.topback').hide();
            $('.floorshow').addClass('floor').removeClass('floorshow');
        }
        if(h>1000){
            $('.desc .desctab').css({
                'position':'fixed',
                'left':0,
                'top':0,
                'width':'100%',
                'background':'#fff'

            });
        }

        if(h<1000){
            $('.desc .desctab').css({
                'position':'static'
            });
        }

    });

    $('.topback').click(function() {
        $('html,body').animate({
            scrollTop: 0
        }, 400);
    });
    $('.topback').hover(function() {
        $(this).find('a').text('返回顶部');
    }, function() {
        $(this).find('a').text('');
        $(this).find('a').css({
            'background': '#8C8C8C',
            'color': '#fff'
        })
    });

    $('.listcontent ul li').hover(function() {
        $(this).find('.desc .btns').stop().animate({
            'marginTop': 20
        }, 100);
    }, function() {
        $(this).find('.desc .btns').stop().animate({
            'marginTop': 80
        }, 100);
    });

    //搜索
    $('.seachtxt').blur(function() {
        fous = $(this).val();
        if(fous === "") {
            $(this).val('请输入关键字');
        }
        if(fous != "") {
            $(this).val();
        }
    });
    $('.seachtxt').focus(function() {
        $(this).val('');
    });

    //	导航开始
    $('#top .navbox .main .navHidden .list li:even').addClass('on');
    $('#top .navbox .main .navHidden .list li').eq(1).find('i').addClass('c1');
    $('#top .navbox .main .navHidden .list li').eq(2).find('i').addClass('c2');
    $('#top .navbox .main .navHidden .list li').find('i').eq(3).addClass('c3');
    $('#top .navbox .main .navHidden .list li').find('i').eq(4).addClass('c4');
    $('#top .navbox .main .navHidden .list li').find('i').eq(5).addClass('c5');
    $('#top .navbox .main .navHidden .list li').find('i').eq(6).addClass('c6');
    $('#top .navbox .main .navHidden .list li').find('i').eq(7).addClass('c7');

    slidemenu(".menu li");

    function slidemenu(_this) {
        $(_this).each(function() {
            var $this = $(this);
            var theMenu = $this.find(".menuHiden");
            var tarHeight = theMenu.height();
            theMenu.css({
                height: 0
            });
            $this.hover(
                function() {

                    theMenu.stop().show().animate({
                        height: tarHeight
                    }, 400);
                },
                function() {

                    theMenu.stop().animate({
                        height: 0
                    }, 10, function() {
                        $(this).css({
                            display: "none"
                        });
                    });
                }
            );
        });
    }


    $('.box .zhezhao').hover(function(){
        $(this).parent().find('.sekuai').show();
        $('.bgTu').show();
    },function(){
        $(this).parent().find('.sekuai').hide();
        $('.bgTu').hide();
    });

    $('.box .zhezhao').mousemove(function(ev){
        var ev=window.event || ev;
        var left=ev.clientX-$('.box').offset().left-$(this).parent().find('.sekuai').width()/2;
        var top=ev.clientY-$('.box').offset().top-$(this).parent().find('.sekuai').height()/2;
        left=left<0?left=0:left;
        top=top<0?top=0:top;
        left=left>$('.box .sekuai').width()?left=$('.box .sekuai').width():left;
        top=top>$('.box .sekuai').height()?top=$('.box .sekuai').height():top;
        $(this).parent().find('.sekuai').css({left:left,top:top});
        var scaleX=$('.box .zhezhao').width()/$('.box .sekuai').width();
        var scaleY=$('.box .zhezhao').height()/$('.box .sekuai').height();
        $('.box .bgTu img').css({left:-scaleX*left,top:-scaleY*top});
    });

    $('.box .list1 ul li').hover(function(){
        var b=$(this).index();
        var t=$(this).html();
        $('.box .smallTu').html(t);
        var x=$('.box .bgTuHide ul li').eq(b).html();
        $('.box .bgTu').html(x);

        $(this).addClass('on').siblings().removeClass('on');
    });

    $('.box .smallTu').html($('.box .list1 ul li').eq(0).html());
    $('.box .bgTu').html($('.box .bgTuHide ul li').eq(0).html());
    $('.box .list1 ul li').eq(0).addClass('on');
    $('.box .list1 ul li').click(function(){
        var b=$(this).index();
        var t=$(this).html();
        $('.box .smallTu').html(t);
        var x=$('.box .bgTuHide ul li').eq(b).html();
        $('.box .bgTu').html(x);
    });

    var l=$('.box .list1 ul li').length*($('.box .list1 ul li').width()+9);

    $('.box .list1 ul').width(l);
    $('.box a.xia').click(function(){
        $('.box .list1 ul').stop(true,false).animate({left:366-l},400);

    });
    $('.box a.shang').click(function(){
        $('.box .list1 ul').stop(true,false).animate({left:l-445},400);

    });

    $('.cont .content-right .category ul li').click(function(){
        $(this).addClass('zhong').siblings().removeClass('zhong');

    });


    // function setcount(){
    // 	 len=$('.shopcount');
    // 	var n=0;
    // 	for (var i = 0; i < len.length; i++) {
    // 			n += parseInt($(len[i]).text());
    // 	}
    //
    // 	return {n:n,l:len.length};
    // }
    // $('.heji span').text(setcount().n+'元');
    // $('.gongji span').text(setcount().l);
    // $('.car .carshop .shopcontent .shopnum a.num_r').click(function(){
    // 	var danjia=parseInt($(this).closest('.shopnum').prev().text());
    // 	var count=parseInt($(this).closest('.shopnum').next().text());
    //
    // 	var num=$(this).prev().val();
    // 	if(num>=0){
    // 		num++;
    // 		$(this).prev().val(num);
    //
    // 		$(this).closest('.shopnum').next().text(num*danjia+'元');
    // 		$('.heji span').text(setcount().n+'元');
    //
    // 	}
    // 	if(num>100){
    // 		alert('最大100台，再多我就要破产了');
    // 		$(this).prev().val(100);
    // 		$(this).closest('.shopnum').next().text(100*danjia+'元');
    // 	}
    // });
    // $('.car .carshop .shopcontent .shopnum a.num_l').click(function(){
    // 	var danjia=parseInt($(this).closest('.shopnum').prev().text());
    // 	var count=parseInt($(this).closest('.shopnum').next().text());
    // 	var num=$(this).next().val();
    // 	if(num<=1){
    // 		alert('小于1咋买啊');
    // 		$(this).next().val(1);
    // 	}
    // 	if(num>1){
    // 		num--;
    // 		$(this).next().val(num);
    //
    // 		$(this).closest('.shopnum').next().text(num*danjia+'元');
    // 		$('.heji span').text(setcount().n+'元');
    // 	}
    // });
    //
    // dis();
    // $('.shophandle span').click(function(){
    // 	$(this).closest('.shopcontent').remove();
    // 	$('.heji span').text(setcount().n+'元');
    // 	$('.gongji span').text(setcount().l);
    // 	dis()
    // });
    // function dis(){
    // 	if($('.gongji span').text()<=0){
    // 		$('.gou input').css({'background':'#ccc'}).attr('disabled','disabled');
    // 	}
    // }













    // t=true;
    // $('.checkbox .check').click(function(){
    //
    // 	if(t){
    // 		$(this).addClass('checkon');
    // 		t=false;
    //
    //
    // 	}else{
    // 		$(this).removeClass('checkon');
    // 		t=true;
    //
    // 	}
    //
    //
    // });
    // f=true;
    // $('#allcheck').click(function(){
    // 	if(f){
    // 		$('.checkbox .check').addClass('checkon');
    // 		f=false;
    // 		t=false;
    //
    // 	}else{
    // 		$('.checkbox .check').removeClass('checkon');
    // 		f=true;
    // 		t=true;
    // 	}
    // });


    $('.regcontent .layout .reginput input').focus(function(){
        $(this).css({'border-color':'#36aa3f'});
    });
    $('.regcontent .layout .reginput input').blur(function(){
        $(this).css({'border-color':'#ccc'});
    });

    $('.listcontent ul li .listdesc').hover(function(){
        $(this).stop(true,true).animate({"top":"-5px"},300);
    },function(){
        $(this).stop(true,true).animate({"top":"0px"},300);
    });


})
