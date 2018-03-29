						<tr>
							<th><input type="checkbox" name="" id=""></th>
							<th>ID</th>
							<th>排序</th>
							<th>title</th>
							<th>img</th>
							<th>操作</th>
						</tr>
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