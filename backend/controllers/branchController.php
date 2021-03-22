<?php 


class branchController{

	 public static function viewBranchAddressController(){


	 	$answer=  branchModel::viewBranchAddressModel("sucursales");

	 	foreach ($answer as $row => $item) {
	 	
	 		echo '
			
			<tr>
			<td>
			<div class="form-check" style="text-align:left; font-size:13px">	
			
	 		<input type="radio" class="form-check-input" id="sucursalId" name="checkRp" value="'.$item["id"].'">'.utf8_decode($item["branch"]).'
	 		
	 		</div>
	 		</td>
			</tr>';



	 				}


	 		}



}