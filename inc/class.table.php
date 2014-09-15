<?php

class Array_View_Table
{
	private $tbl_value;
	private $tbl_display;

	public function view($array_value)
	{
		if (!empty($array_value) && is_array($array_value)) {
			$this->tbl_value = $array_value;

			$this->tbl_display = "\n".'<table class="lucen">';

			// view title
			$this->th_view();

			// view value
			$this->td_view();

			$this->tbl_display .= "\n</table>";

		} else {
			$this->tbl_display = "<table class='lucen'><tr><td> value not found. </td></tr></table>";
		}

		return $this->tbl_display;
	}

	private function th_view()
	{
		foreach ($this->tbl_value as $th_entry) {
			$this->tbl_display .= "\n<tr>";
			foreach ($th_entry as $title => $tmp) {
				$this->tbl_display .= "<th>".$title."</th>";
			}
			$this->tbl_display .= "</tr>";
			break;
		}
	}

	private function td_view()
	{
		foreach ($this->tbl_value as $td_entry) {
			$this->tbl_display .= "\n<tr>";
			foreach ($td_entry as $value) {
				$this->tbl_display .= "<td>".$value."</td>";
			}
			$this->tbl_display .= "</tr>";
		}
		return;
	}
}