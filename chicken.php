<?php
header('content-type:text/html; charset=utf-8');
//百钱百鸡问题
//	已知：公鸡5元一只，母鸡3元一只，小鸡1元三只。
//	现用100元钱买了100只鸡，问：公鸡、母鸡、小鸡各几只？

/*
	思路：
		三层循环，穷举尝试
		效率太低，考虑优化
		
	穷举法适用范围：
		1.数量确定有限
		2.有规律可循
		3.利用规律减少穷举
*/

$g = 0; //公鸡
$m = 0; //母鸡
$x = 0;	//小鸡
$count = 0;	//尝试次数
for($g=0;$g<=100;$g++){
	for($m=0;$m<=100;$m++){
		$count++; 

		$x = 100 - $g - $m;
		if( $g*5 + $m*3 + $x*(1/3) == 100 ){
			echo '公鸡：',$g,'只； ','母鸡：',$m,'只； ','小鸡：',$x,'只； ','<br/>';
		}
	}
}
echo '尝试<font color="red">',$count,'</font>次！<br/><hr/>';


$g = 0; //公鸡
$m = 0; //母鸡
$x = 0;	//小鸡
$count = 0;	//尝试次数
for($g=0;$g<=(100/5);$g++){				//考虑总价，则公鸡最多100/5只
	for($m=0;$m<=(100/3);$m++){			//考虑总价，则母鸡最多100/3只
		$count++; 

		$x = 100 - $g - $m;				//考虑总数，推导出小鸡数
		if( $g*5 + $m*3 + $x*(1/3) == 100 ){
			echo '公鸡：',$g,'只； ','母鸡：',$m,'只； ','小鸡：',$x,'只； ','<br/>';
		}
	}
}
echo '尝试<font color="red">',$count,'</font>次！<br/><hr/>';


$g = 0; //公鸡
$m = 0; //母鸡
$x = 0;	//小鸡
$count = 0;	//尝试次数
for($g=0;$g<=(100/5);$g++){				//考虑总价，则公鸡最多100/5只
	for($m=0;$m<=((100-$g*5)/3);$m++){	//考虑总价，则母鸡最多100/3只；
										//考虑买公鸡花去钱数，则买母鸡剩余 100-$g*5 元钱
		$count++; 

		$x = 100 - $g - $m;				//考虑总数，推导出小鸡数
		if( $g*5 + $m*3 + $x*(1/3) == 100 ){
			echo '公鸡：',$g,'只； ','母鸡：',$m,'只； ','小鸡：',$x,'只； ','<br/>';
		}

	}
}
echo '尝试<font color="red">',$count,'</font>次！<br/><hr/>';


$g = 0; //公鸡
$m = 0; //母鸡
$x = 0;	//小鸡
$count = 0;	//尝试次数
for($g=0;$g<=(100/5);$g++){					//考虑总价，则公鸡最多 100/5 只

	for($m=0;$m<=((100-$g*5)/3-$g);$m++){	//考虑总价，则母鸡最多 100/3 只；
											//考虑买公鸡花去钱数，则买母鸡剩余 100-$g*5 元钱
											//考虑买公鸡数，则可买母鸡 (100-$g*5)/3-$g 只
		
		$count++; 

		$x = 100 - $g - $m;					//考虑总数，推导出小鸡数
		if( $x%3 == 0 ){					//考虑总价为整数，则确定小鸡数量只必须能被3整除
			if( $g*5 + $m*3 + $x*(1/3) == 100 ){
				echo '公鸡：',$g,'只； ','母鸡：',$m,'只； ','小鸡：',$x,'只； ','<br/>';
			}
		}
	}
}
echo '尝试<font color="red">',$count,'</font>次！<br/><hr/>';
?>