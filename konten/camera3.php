<!DOCTYPE html>
<html>
<head>
<style>
.main
{
    margin-left: auto;
    margin-right: auto;
    width: 690px;
}
.snap
{
    color: white;
    border-radius: 4px;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    background: rgb(28, 184, 65);
    font-family: inherit;
    font-size: 100%;
    padding: .5em 1em;
    border: 0 hsla(0, 0%, 0%, 0);
    text-decoration: none;
}
.border
{
    border: 3px rgb(28, 184, 65) solid;
    padding: 5px;
    width: 320px;
    height: 258px;
}
</style>

    <script type="text/javascript" src="webcam.js"></script>
    <script>
        webcam.set_api_url( 'konten/upload.php' );
        webcam.set_quality( 90 ); // JPEG quality (1 - 100)
        webcam.set_shutter_sound( true ); // play shutter click sound
        
        webcam.set_hook( 'onComplete', 'my_completion_handler' );
        
        function take_snapshot() {
            // take snapshot and upload to server
            document.getElementById('upload_results').innerHTML = 'Snapshot<br>'+
            '<img src="uploading.gif">';
            webcam.snap();
        }
        
        function my_completion_handler(msg) {
            // extract URL out of PHP output
            if (msg.match(/(http\:\/\/\S+)/)) {
                var image_url = RegExp.$1;
                // show JPEG image in page
                document.getElementById('upload_results').innerHTML = 
                    'Snapshot<br>' + 
                    '<a href="'+image_url+'" target"_blank"><img src="' + image_url + '"></a>';
                
                // reset camera for another shot
                webcam.reset();
            }
            else alert("PHP Error: " + msg);
        }
    </script>

</head>
<body>
<br></br><br></br>
	<table class="main">
        <tr>
            <td valign="top">
	            <div class="border">
                Live Webcam<br>
                <script>
                document.write( webcam.get_html(320, 240) );
                </script>
                </div>
                <br/><input type="button" class="snap" value="SNAP IT" onClick="take_snapshot()"/>
				<a href="index.php?module=profil_mhs#pos"><input type="button" class="snap" value="OK"></input></a>
            </td>
            <td width="50">&nbsp;</td>
            <td valign="top">
                <div id="upload_results" class="border">
                    Snapshot<br>
                    <img src="konten/logo.jpg" />
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
