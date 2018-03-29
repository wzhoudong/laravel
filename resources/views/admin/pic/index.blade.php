@extends ('publicmuban.admin')


@section('main')
<!-- 内容 -->
			<div class="col-md-10">
				
				<ol class="breadcrumb">
					<li><a href="#"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
					<li><a href="#">图片管理</a></li>
					<li class="active">图片列表</li>

					<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
				</ol>

				<!-- 面版 -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-danger" onclick="delAll();"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
						<a href="/admin/pic/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加图片</a>
						
						<p class="pull-right tots">共有 <span id="num">{{count($data)}} </span>条数据</p>
						<form action="" class="form-inline pull-right">
							<div class="form-group">
								<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
							</div>
							
							<input type="submit" value="搜索" class="btn btn-success">
						</form>


					</div>
					<table class="table-bordered table table-hover" id="zhou">
						<th><input type="checkbox" name="" id=""></th>
						<th>ID</th>
						<th>排序</th>
						<th>title</th>
						<th>img</th>
						<th>操作</th>
						@foreach($data as $v)
						<tr id="tr{{$v->id}}">
							<th><input type="checkbox" value="{{$v->id}}" class="inputs"></th>
							<td>{{$v->id}}</td>
							<td><input type="text"  value="{{$v->sort}}" onchange="change(this,{{$v->id}})" /></td>
							<td>{{$v->title}}</td>
							<td><img src="{{$v->img}}" style="width: 100px;height: 80px;"></td>
							<td><span class="btn btn-success">开启</span></td>
							<td><a href="/admin/pic/{{$v->id}}/edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="glyphicon glyphicon-trash" onclick="del(this,{{$v->id}})"></a></td>
						</tr>
						@endforeach()
					</table>
					<!-- 分页效果 -->
					<div class="panel-footer">
						<nav style="text-align:center;">
							<ul class="pagination">
								{{ $data->links() }}
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<script>
				// function page1(obj,page){
				// 	$.get('/admin/pic/',{'page':page},function(data){
				// 		alert(data);
				// 		$("#zhou").html(data);
				// 	});	
				// }

				function page(obj,page){
					$.get('/admin/pic/',{'page':page},function(data){
						var str = '';
						$.each(data,function(i,v){
							str +=	'<tr id="tr '+v.id+'">';
							str+=	'<th><input type="checkbox" value="'+v.id+'" class="inputs"></th>';	
							str+=   '<td>'+v.id+'</td>';
							str+=	'<td><input type="text"  value="'+v.sort+'" onchange="change(this,'+v.id+')" /></td>';	
							str+=	'<td>'+v.title+'</td>';
							str+=	'<td><img src="'+v.img+'" style="width: 100px;height: 80px;"></td>';	
							str+=	'<td><span class="btn btn-success">开启</span></td>';	
							str+=   '<td><a href="/admin/pic/{{$v->id}}/edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="glyphicon glyphicon-trash" onclick="del(this,{{$v->id}})"></a></td>';		
							str+= '</tr>';
						});
						$("#zhou").html(str);
					});	
				}

				function del(obj,id){
					$.post('/admin/pic/'+id,{'id':id,'_method':'delete','_token':'{{ csrf_token()}}'},function(data){
							if(data.code){
								$(obj).parent().parent().remove();
								var num = $("#num").text();
								$("#num").html(--num);
							}else{
								alert('删除失败!');
							}
					});
				}
				function delAll(){
					arr = [];
					inputs = $(".inputs:checked");
					for(var i = inputs.length - 1; i>=0; i--){
						arr.push(inputs.eq(i).val());
					}
					str = arr.join(',');
					$.post('/admin/pic/delall',{'str':str,'_method':'post','_token':'{{csrf_token()}}'},function(data){
							if(data){
								for (var i = arr.length - 1; i >= 0; i--) {
									$("#tr"+arr[i]).remove();
								};
								var num = Number($("#num").text())-Number(data);
								$("#num").html(num);
							}else{
								alert('删除失败');
							}
					});
				}
				function change(obj,id){
						val=$(obj).val();
						$.post('/admin/pic/sort',{'id':id,'sort':val,'_method':'post','_token':'{{csrf_token()}}'},function(data){
						if (data==1) {
							// 页面自动刷新
							window.location.reload();
						}else{
							alert('修改失败');
						}
					});
				}
			</script>
@endsection



	