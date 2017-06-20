<?php 
	function MenuMulti($data,$parent,$str = "-",$select = 0)
	{
		foreach ($data as $val)
		{
			if($val['parent_id'] == $parent)
			{
				$id=$val['id'];
				$name=$val['name'];
				if($select != 0 && $id == $select)
				{
					echo "<option value=".$id." selected >".$str." ".$name."</option>";
				}
				else
				{
					echo "<option value=".$id.">".$str." ".$name."</option>";
				}
				
				MenuMulti($data,$id,$str." - -",$select);
			}
			
		}
	}
	function ListCate($data,$parent=0,$str = "") 
	{
		foreach ($data as $val) {
			$id=$val['id'];
			$name=$val['name'];
			if($val['parent_id'] == $parent)
			{
				echo "<tr>";
                    	if($str==""){
                    		echo "<td>".$str.$name."</td>";
                    	}else{
                    		echo "<td><i>".$str.$name."</i></td>";
                    	} 
	           	echo "	<td>
	                        <a href='edit/".$id."' title='Sửa'><i class='fa fa-edit' style='color: blue'></i></a> || <a href='delete/".$id."' onclick='return confirm(\"Are you sure ?\")' title='Xóa'><i class='fa fa-trash-o' style='color: red'></i></a>
	                    </td>
	                </tr>";
	            ListCate($data,$id,$str." - - ");
			}
			
		}
	}
	function ListUser($data)
	{
		$stt=0;
		foreach ($data as $val) {
			$id=$val['id'];
			$stt++;
			$username=$val['username'];
			$email=$val['email'];
			$level=$val['level'];
			echo 	"<tr>
						<td>".$stt."</td>
						<td>".$username."</td>
						<td>".$email."</td>
						<td>";
						if($level == 0){
							echo "Admin";
						}else{
							echo "Thành Viên";
						}
			echo "</td>
						<td>
							<a href='edit/".$id."' title='Sửa'><i class='fa fa-edit' style='color: blue'></i></a> || <a href='delete/".$id."' onclick='return confirm(\"Are you sure ?\")' title='Xóa'><i class='fa fa-trash-o' style='color: red'></i></a>
						</td>
					</tr>";
		}
	}
	function ListUserDetail($data)
	{
		foreach ($data as $val) {
			$username=$val['username'];
			$email=$val['email'];
			$birth=$val['birthday'];
			$sex=$val['sex'];
			$level=$val['level'];
			echo "
				<p>".$username."</p>
                <p>".$email."</p>
                <p>".$birth."</p>
                <p>".$sex."</p>
                <p>";
                	if($level == 0){
                		echo "Quản Trị";
                	}else{
                		echo "Thành Viên";
                	}
            echo "</p>";
		}
	}
	function ListFile($data)
	{
		$stt=0;
		foreach ($data as $val) {
			$stt++;
			$id=$val->id;
			$i=$val->loai_id;
			echo "<tr>
				<td>".$stt."</td>
				<td>".$val->title."</td>
				<td>".$val->sotap."</td>
				<td>".$val->username."</td>
				<td>
					<a href='edit/".$id ."/".$i."' title='Sửa'><i class='fa fa-edit' style='color: blue'></i></a> || <a href='additem/".$id."'><i class='fa fa-plus-square'></i></a> || <a href='delete/".$id."' onclick='return confirm(\"Are you sure ?\")' title='Xóa'><i class='fa fa-trash-o' style='color: red'></i></a>
				</td>
			</tr>";
		}
	}
	function ListSlide($data)
	{
		$stt=0;
		foreach ($data as $item) {
			$stt++;
			$id=$item['id'];
			echo "<tr>
				<td>".$stt."</td>
				<td>".$item['title']."</td>
				<td><img id='img_slide' src='../../Image/Slide/".$item['image']."' /></td>
				<td>
					<a href='sua-slide/".$id ."' title='Sửa'><i class='fa fa-edit' style='color: blue'></i></a> || 
					<a href='xoa-slide/".$id."' onclick='return confirm(\"Are you sure ?\")' title='Xóa'><i class='fa fa-trash-o' style='color: red'></i></a>
				</td>
			</tr>";
		}
	}
	function subMenu($data,$id)
	{
		echo "<ul>";
			foreach ($data as $item) {
				if($item['parent_id'] == $id){
					echo "<li><a href='../../danh-muc/".$item['id'].".".$item['parent_id']."/".$item['metatitle'].".html'>".$item['name']."</a>";
						subMenu($data,$item['id']);
					echo "</li>";
				}
			}
		echo "</ul>";
	}
	function tap($data)
	{
		$stt=0;
		echo "<ul class='tap'>";
			foreach ($data as $item) {
				$stt++;
				echo "<li><a href='".url('xem-phim/'.$item['products']['id'].'.'.$item['id'].'t'.$item['tap'].'-'.$item['products']['metatitle'].'.html')."'>".$stt."</a></li>";
			}
		echo "</ul>";
	}
	function source($data,$i)
	{	
		
		foreach ($data as $item) 
		{
			if( $item['id']==$i )
			{
				echo "<source src='".url('Files/videos/'.$item['source'])."'  type='video/mp4' />";	  
			}
		}
		
	}
	function sourcelink($data,$i)
	{
		foreach ($data as $item) {
			if($item['id'] == $i){
				echo "<iframe style='width: 100%;height: 100%' src='".$item['link']."' allowfullscreen></iframe>";
			}
		}
	}
?>