<?php 
	interface IAppointment{
		public function get();
		public function getTodaysAppointments();
		public function getAppointmentsInDateRange($ztcw55, $colb56);
		public function deleteProductAppointment();
	    public function save();
	    public function update();
	    public function delete();
	}
?>