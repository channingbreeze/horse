function GetMap() {
	
	var points = new Array(
		new VELatLong(45.01188,-111.06687, 0, VEAltitudeMode. RelativeToGround),
		new VELatLong(45.01534,-104.06324, 0, VEAltitudeMode. RelativeToGround),
		new VELatLong(41.01929,-104.06, 0, VEAltitudeMode. RelativeToGround),
		new VELatLong(41.003,-111.05878, 0, VEAltitudeMode. RelativeToGround)
	);
	
	map = new VEMap('myMap');
	
	map.LoadMap(
		new VELatLong(45.01188,-111.06687),  // center
		5, // zoom level
		VEMapStyle.Road, // map style
		false, // fixed map
		VEMapMode.Mode2D, // map mode
		false,  // show map mode switch
		0, // tile buffer
		null// options
	);
	
	map.HideDashboard();

	var myPolygon = new VEShape(VEShapeType.Pushpin, points);
	map.AddShape(myPolygon);
	myPolygon.SetPhotoURL("http://www.baidu.com/img/bdlogo.png");
	myPolygon.SetTitle("My Polygon");
	myPolygon.SetDescription("This is the description for my polygon.");
	myPolygon.SetCustomIcon("images/pin.png");
 
}
