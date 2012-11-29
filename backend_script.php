<?php

error_reporting(0);


/*

DATABASE CONNECTON HERE

*/

$global_dbh=mysql_connect($db_host,$db_user,$db_pass) or die(mysql_error());

mysql_select_db($db_name,$global_dbh) or die(mysql_error());

mysql_query("SET CHARACTER SET 'utf8'");

$array_products = array();


$query3 = "SELECT product_id,product_name,product_thumb_image,product_discount_id FROM jos_vm_product WHERE product_discount_id <> ''";

$result3 = mysql_query($query3) or die("bad query " . mysql_error());

while (list($product_id,$product_name,$product_thumb_image,$product_discount_id)= mysql_fetch_row($result3))

        {
		 $splash_discount = $product_discount_id;	
		 
		 
		        
                 $nn = $product_id;
                 
                $query99 = "SELECT jos_vm_product_category_xref.category_id,jos_vm_category.category_name FROM jos_vm_product_category_xref,jos_vm_category WHERE product_id ='" . $nn ."' AND jos_vm_product_category_xref.category_id = jos_vm_category.category_id";

                $result99 = mysql_query($query99) or die("bad query " . mysql_error());

                while (list($category_id,$catname)= mysql_fetch_row($result99))

                  {

                                     

                 $query5 = "SELECT amount,is_percent,start_date,end_date FROM jos_vm_product_discount WHERE discount_id Like '".$splash_discount."' ";

                 $result5 = mysql_query($query5) or die("bad query " . mysql_error());

                    while (list($amount,$is_percent,$start_date,$end_date)= mysql_fetch_row($result5))

                     {
		 
		               $startova_date = strftime( '%Y-%m-%d',$start_date);

                       $d1 = strtotime($startova_date);

                       $krajna_date = strftime( '%Y-%m-%d',$end_date);

                       $d2 = strtotime($krajna_date);

                       $tekushta_date =  date('Y-m-d',$_SERVER['REQUEST_TIME']);

                       $d3 = strtotime($tekushta_date);
					   
					   
					   $query52 = "SELECT product_price_id,product_price,product_currency FROM jos_vm_product_price Where product_id='".$product_id."'";

						$result52 = mysql_query($query52) or die("bad query " . mysql_error());

						while (list($product_price_id,$product_price,$product_currency)= mysql_fetch_row($result52))
	
						 {
	
							  $mnm = (float)$product_price;
	
							 
							 $this_price = number_format($mnm, 2, '.', '');
							 if($this_price != 0.00){	 
							 
							 
							 						          
                                          if($d3 >= $d1 && $d3 <= $d2) {



                                            if ($is_percent == 0){

                                                 $new_price = $this_price - $amount;
                                                 $new_price = number_format($new_price, 2, '.', '');
                                            

                                            }

                                            else{

                                                 $new_price = $this_price-($this_price * ($amount/100));
												 $new_price = number_format($new_price, 2, '.', '');

                                                }



                                            

                                              $check_date = 1;

                                  }

                                  else {

                                        $check_date = 0;

                                    

                                    }
							 
													 
							 
							 
							 
							 if ($check_date == 1){ 
							 
							 $links = '<a href="http://captainhook.bg/index.php?page=shop.product_details&category_id='.$category_id.'&flypage=vmj_estore.tpl&product_id='.$product_id.'&option=com_virtuemart&itemid=32"><img src="http://captainhook.bg/components/com_virtuemart/show_image_in_imgtag.php?filename=resized%2'.$product_thumb_image.'" alt="'.$product_name.'" border="0" height="100px" width="120px"/></a>';
							 $linksa = '<a href="http://captainhook.bg/index.php?page=shop.product_details&category_id='.$category_id.'&flypage=vmj_estore.tpl&product_id='.$product_id.'&option=com_virtuemart&itemid=32">Поръчай</a>';
		 
			
         $array_products [] = array('product_id'=>$product_id,'product_name'=>$product_name,'product_img'=>$product_thumb_image,'category'=>$category_id,'catname'=>$catname,'original_price'=>$this_price,'new_price'=>$new_price,'curency'=>$product_currency,'links'=>$links,'urls'=>$linksa);
							 }
						
							 }
		        
					 }
				      
					 }
					 
						
			  
			  }

        }



echo json_encode($array_products);   

?>








