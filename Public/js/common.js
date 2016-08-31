$(document).ready(function(){
	$('.attt').hide();
	$('.aupstatus').change(function(){
		var sid = $(this).val();
		var id = $(this).attr('rel');
		var url = $(this).attr('data-url');
		var orderid = $(this).attr('data-id');
		//alert('type='+type+'&where='+where);

		$.ajax({
			url: url,
			type:'post',
			data:"sid="+sid+"&oid="+id+"&orderid="+orderid,
			dataType:"json",
			//ansyc:"false",
			success:function(data){
				//var d = "<tr class='odd'><td align='center'>"+data.msg+"</td></tr>";
				if(data.status == 1){
					alert('更新成功');
				}else{
					alert('更新失败');
				}
				//alert(data.msg);  
			}
		});

	});

	$('.zhuang').change(function(){
		var sid = $(this).val();
		var id = $(this).attr('rel');
		var url = $(this).attr('data-url');
		var orderid = $(this).attr('data-id');
		//alert('type='+type+'&where='+where);
		if (sid !== '') {
				$.ajax({
				url: url,
				type:'post',
				data:"sid="+sid+"&oid="+id+"&orderid="+orderid,
				dataType:"json",
				//ansyc:"false",
				success:function(data){
					//var d = "<tr class='odd'><td align='center'>"+data.msg+"</td></tr>";
					if(data.status == 1){
						alert('更新成功');
					}else{
						alert('更新失败');
					}
					//alert(data.msg);  
				}
			});
		}
		
	});

	$('.car').change(function() {
		var id = $(this).attr('rel');
		var sid = $("#stat_"+id).val();
		if(sid != 5){
			$('#stat_'+id+' option[value=5]').attr('selected',true);
		}
	});

	$('.szhuang').change(function(){
		var sid = $(this).val();
		var id = $(this).attr('rel');
		var url = $(this).attr('data-url');
		var orderid = $(this).attr('data-id');
		//alert('type='+type+'&where='+where);
		$.ajax({
			url: url,
			type:'post',
			data:"sid="+sid+"&oid="+id+"&orderid="+orderid,
			dataType:"json",
			//ansyc:"false",
			success:function(data){
				//var d = "<tr class='odd'><td align='center'>"+data.msg+"</td></tr>";
				if(data.status == 1){
					alert('更新成功');
				}else{
					alert('更新失败');
				}
				//alert(data.msg);  
			}
		});
	});

	$('.car').change(function(){
		var mid = $(this).val();
		var id = $(this).attr('rel');
		var url = $(this).attr('data-url');
		var orderid = $(this).attr('data-id');
		//alert('type='+type+'&where='+where);
		$.ajax({
			url: url,
			type:'post',
			data:"mid="+mid+"&id="+id+"&orderid="+orderid,
			dataType:"json",
			//ansyc:"false",
			success:function(data){
				//var d = "<tr class='odd'><td align='center'>"+data.msg+"</td></tr>";
				if(data.status == 1){
					alert('更新成功');
				}else{
					alert('更新失败');
				}
				//alert(data.msg);  
			}
		});
	});

	$('.pzhuang').change(function(){
		var sid = $(this).val();
		var id = $(this).attr('rel');
		var url = $(this).attr('data-url');
		var orderid = $(this).attr('data-id');
		//alert('type='+type+'&where='+where);
		$.ajax({
			url: url,
			type:'post',
			data:"sid="+sid+"&oid="+id+"&orderid="+orderid,
			dataType:"json",
			//ansyc:"false",
			success:function(data){
				//var d = "<tr class='odd'><td align='center'>"+data.msg+"</td></tr>";
				if(data.status == 1){
					alert('更新成功');
				}else{
					alert('更新失败');
				}
				//alert(data.msg);  
			}
		});
	});
	
	
	//订单筛选
	
	$('.filter_statusid').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	$('.orderby').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	
	$('.orderby').click(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).attr('rel');
		$(this).addClass("active");
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	
	$('.filter_cityid').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	$('.cityid').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	$('.roleid').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	
	$('.filter_logisticsid').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	$('.filter_sellerid').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});

	$('.quer').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	$('.yuy').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	
	$('.filter_cart').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	
	$('.orderc').change(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).find("option:selected").attr('rel');
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});
	
	$('.attc').click(function(){
		$('.attt').show();
	});

	$('.attt').click(function() {
		$('.attt').hide();
	});

	
	//左边菜单
	
	$(".leftclick").click(function(){
		if($(this).hasClass('clicked')){
			$(this).removeClass('clicked');
			$(".LeftMenu").show();
		}else{
			$(this).addClass('clicked');
			$(".LeftMenu").hide();
		}
	});
	
	$('.sborder').click(function(){
		//var dd = $(this).find("option:selected").text();
		var url = $(this).attr('rel');
		$(this).addClass("active");
		$.get(url, { id: '' },
			function(data){
				$('.midder').html(data);
		});
		//alert('type='+type+'&where='+where);
		
	});

	var old;
	$('.trshow').click(function() {
		if(old === $(this).attr('rel')) {
			$(this).next('tr').hide();
			ne = $(this).attr('rel');
			old = '';
		} else {
			$('.trhide').hide();
	        $(this).next('tr').show();
	        old = $(this).attr('rel');
		}
    });  
    
    $('#qrsub').click(function () {
    	$('#formqr').submit();
    });
})