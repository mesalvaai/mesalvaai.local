<?php  
namespace App\Helpers;

class ProgressBar
{
	public static function progressDonation($funds_received, $goal)
	{
		$porsentagem = ($funds_received * 100) / $goal;
		$progress = round($porsentagem) . '%';
		return $progress;
	}
}

?>